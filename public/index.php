<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.4/socket.io.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Data Mahasiswa</h2>
        <div class="row">
            <div class="col-md-12 mb-4">
                <h3>Total Mahasiswa per Prodi</h3>
                <ul id="prodiList" class="list-group"></ul>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataMahasiswa"></tbody>
                </table>
            </div>
        </div>

        <h2 class="text-center mt-4">Tambah Mahasiswa</h2>
        <form id="formMahasiswa" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="nama" placeholder="Nama" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="nim" placeholder="NIM" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="angkatan" placeholder="Angkatan" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="no_hp" placeholder="No HP" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <h2 class="text-center">Grafik Mahasiswa per Jurusan</h2>
        <canvas id="chartMahasiswa" class="mb-4" width="400" height="200"></canvas>
    </div>

    <script>
        const socket = io("http://localhost:3000");

        // Fungsi untuk meminta data terbaru dari server
        function fetchData() {
            socket.emit("fetchData");
        }

        // Mendengarkan perubahan data mahasiswa dari server
        socket.on("updateMahasiswa", (data) => {
            let rows = "";
            const jurusanCount = {};

            data.forEach((mhs) => {
                rows += `<tr>
                    <td>${mhs.id}</td>
                    <td>${mhs.nama}</td>
                    <td>${mhs.nim}</td>
                    <td>${mhs.jurusan}</td>
                    <td>${mhs.angkatan}</td>
                    <td>${mhs.email}</td>
                    <td>${mhs.alamat}</td>
                    <td>${mhs.no_hp}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="hapusMahasiswa(${mhs.id})">Hapus</button></td>
                </tr>`;

                if (jurusanCount[mhs.jurusan]) {
                    jurusanCount[mhs.jurusan]++;
                } else {
                    jurusanCount[mhs.jurusan] = 1;
                }
            });

            document.getElementById("dataMahasiswa").innerHTML = rows;
            updateChart(jurusanCount);
            updateProdiList(jurusanCount);
        });

        // Fungsi untuk menambah mahasiswa
        document.getElementById("formMahasiswa").addEventListener("submit", function(event) {
            event.preventDefault();
            const nama = document.getElementById("nama").value;
            const nim = document.getElementById("nim").value;
            const jurusan = document.getElementById("jurusan").value;
            const angkatan = document.getElementById("angkatan").value;
            const email = document.getElementById("email").value;
            const alamat = document.getElementById("alamat").value;
            const no_hp = document.getElementById("no_hp").value;

            fetch("http://localhost/pemrograman_jaringan/dashboard/server/insert.php", {
                method: "POST",
                body: new URLSearchParams({ nama, nim, jurusan, angkatan, email, alamat, no_hp }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            })
            .then(response => response.json())
            .then(() => {
                socket.emit("fetchData"); // Meminta data terbaru setelah menambah
                document.getElementById("formMahasiswa").reset();
            });
        });

        // Fungsi untuk menghapus mahasiswa
        function hapusMahasiswa(id) {
            fetch(`http://localhost/pemrograman_jaringan/dashboard/server/delete.php`, {
                method: "POST",
                body: new URLSearchParams({ id }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" }
            })
            .then(response => response.json())
            .then(() => {
                socket.emit("fetchData"); // Meminta data terbaru setelah menghapus
            });
        }

        function updateChart(jurusanCount) {
            const ctx = document.getElementById('chartMahasiswa').getContext('2d');
            const labels = Object.keys(jurusanCount);
            const data = Object.values(jurusanCount);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Mahasiswa',
                        data: data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        function updateProdiList(jurusanCount) {
            const prodiList = document.getElementById("prodiList");
            prodiList.innerHTML = "";
            for (const [jurusan, count] of Object.entries(jurusanCount)) {
                const listItem = document.createElement("li");
                listItem.className = "list-group-item";
                listItem.textContent = `${jurusan}: ${count} mahasiswa`;
                prodiList.appendChild(listItem);
            }
        }

        // Panggil fungsi fetchData() saat halaman dimuat
        fetchData();
        // Update prodi list secara realtime
        socket.on("updateProdiCount", (prodiCount) => {
            const prodiList = document.getElementById("prodiList");
            prodiList.innerHTML = "";
            
            prodiCount.forEach((prodi) => {
                const listItem = document.createElement("li");
                listItem.className = "list-group-item";
                listItem.textContent = `${prodi.jurusan}: ${prodi.jumlah} mahasiswa`;
                prodiList.appendChild(listItem);
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
