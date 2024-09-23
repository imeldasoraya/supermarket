<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Order</title>
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
        <h2>Daftar Order</h2>

        <table>
            <tr>
                <th>ID Order</th>
                <th>ID Pelanggan</th>
                <th>Tanggal Order</th>
                <th>Aksi</th>
            </tr>

            <?php
            // Sertakan file config.php dengan path yang benar
            include "config.php";

            // Periksa apakah variabel $conn didefinisikan dengan benar
            if (!isset($conn)) {
                die("Koneksi ke database gagal. Pastikan konfigurasi database Anda benar.");
            }

            // Lakukan query untuk mendapatkan data order
            $query = "SELECT * FROM `orders`"; // Periksa kembali apakah tabel Anda benar-benar bernama `order` atau ada yang lain
            $result = mysqli_query($conn, $query);

            // Periksa apakah query berhasil dieksekusi
            if (!$result) {
                die("Query gagal dieksekusi: " . mysqli_error($conn));
            }

            // Tampilkan data order dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id_order']}</td>";
                echo "<td>{$row['id_pelanggan']}</td>";
                echo "<td>{$row['tanggal_order']}</td>";
                echo "<td>";
                echo "<a href='edit_order.php?id_order={$row['id_order']}'>Edit</a> | ";
                echo "<a href='hapus_order.php?id_order={$row['id_order']}' onclick='return confirm(\"Anda yakin ingin menghapus order ini?\")'>Hapus</a>";
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
        <a href="tambah.php">Tambah Order Baru</a>
    </div>
</body>
</html>
