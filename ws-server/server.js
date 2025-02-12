const express = require("express");
const http = require("http");
const { Server } = require("socket.io");
const cors = require("cors");
const mysql = require("mysql2");

const app = express();
app.use(cors());
const server = http.createServer(app);
const io = new Server(server, { cors: { origin: "*" } });

const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "db_dashboard"
});

db.connect(err => {
    if (err) {
        console.error("Database connection failed:", err);
        return;
    }
    console.log("Database connected!");
});

// Fungsi untuk mengambil data mahasiswa & jumlah mahasiswa per jurusan
const fetchData = (socket) => {
    db.query("SELECT * FROM mahasiswa", (err, mahasiswa) => {
        if (err) {
            console.error("Error fetching mahasiswa:", err);
            return;
        }

        db.query("SELECT jurusan, COUNT(*) AS jumlah FROM mahasiswa GROUP BY jurusan", (err, prodiCount) => {
            if (err) {
                console.error("Error fetching prodi count:", err);
                return;
            }

            // Kirim data ke semua client
            io.emit("updateMahasiswa", mahasiswa);
            io.emit("updateProdiCount", prodiCount);
        });
    });
};

io.on("connection", (socket) => {
    console.log("User connected:", socket.id);

    // Kirim data pertama kali saat client terhubung
    fetchData(socket);

    socket.on("fetchData", () => {
        fetchData(socket);
    });

    socket.on("addMahasiswa", (data) => {
        const { nama, nim, jurusan, angkatan, email, alamat, no_hp } = data;
        db.query(
            "INSERT INTO mahasiswa (nama, nim, jurusan, angkatan, email, alamat, no_hp) VALUES (?, ?, ?, ?, ?, ?, ?)", 
            [nama, nim, jurusan, angkatan, email, alamat, no_hp], 
            (err) => {
                if (err) {
                    console.error("Error adding mahasiswa:", err);
                    return;
                }
                fetchData(socket); // Ambil data terbaru setelah insert
            }
        );
    });

    socket.on("deleteMahasiswa", (id) => {
        db.query("DELETE FROM mahasiswa WHERE id = ?", [id], (err) => {
            if (err) {
                console.error("Error deleting mahasiswa:", err);
                return;
            }
            fetchData(socket); // Ambil data terbaru setelah delete
        });
    });

    socket.on("disconnect", () => {
        console.log("User disconnected:", socket.id);
    });
});

server.listen(3000, () => {
    console.log("WebSocket Server running on port 3000");
});
