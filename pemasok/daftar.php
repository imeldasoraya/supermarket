<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
            color: #333;
        }
        a:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Pemasok</h2>

        <table>
            <tr>
                <th>ID Pemasok</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>

            <?php
            // Sertakan file config.php dengan path yang benar
            include "config.php";

            // Periksa apakah variabel $conn didefinisikan dengan benar
            if (!isset($conn)) {
                die("Koneksi ke database gagal. Pastikan konfigurasi database Anda benar.");
            }

            // Lakukan query untuk mendapatkan data pemasok
            $query = "SELECT * FROM pemasok";
            $result = mysqli_query($conn, $query);

            // Periksa apakah query berhasil dieksekusi
            if (!$result) {
                die("Query gagal dieksekusi: " . mysqli_error($conn));
            }

            // Tampilkan data pemasok dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id_pemasok']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['kontak']}</td>";
                echo "<td>";
                echo "<a href='edit.php?id_pemasok={$row['id_pemasok']}'>Edit</a> | ";
                echo "<a href='hapus.php?id_pemasok={$row['id_pemasok']}' onclick='return confirm(\"Anda yakin ingin menghapus pemasok ini?\")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }

            // Bebaskan memory hasil query
            mysqli_free_result($result);

            // Tutup koneksi database
            mysqli_close($conn);
            ?>

        </table>
        <br>
        <a href="tambah.php">Tambah Pemasok Baru</a>
    </div>
</body>
</html>
