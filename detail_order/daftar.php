<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Detail Order</title>
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
        <h2>Daftar Detail Order</h2>

        <table>
            <tr>
                <th>ID Detail Order</th>
                <th>ID Order</th>
                <th>ID Produk</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>

            <?php
            // Sertakan file config.php dengan path yang benar
            include "config.php";

            // Periksa apakah variabel $conn didefinisikan dengan benar
            if (!isset($conn)) {
                die("Koneksi ke database gagal. Pastikan konfigurasi database Anda benar.");
            }

            // Lakukan query untuk mendapatkan data detail order
            $query = "SELECT * FROM detail_orders";
            $result = mysqli_query($conn, $query);

            // Periksa apakah query berhasil dieksekusi
            if (!$result) {
                die("Query gagal dieksekusi: " . mysqli_error($conn));
            }

            // Tampilkan data detail order dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id_detail_order']}</td>";
                echo "<td>{$row['id_order']}</td>";
                echo "<td>{$row['id_produk']}</td>";
                echo "<td>{$row['kuantitas']}</td>";
                echo "<td>{$row['harga']}</td>";
                echo "<td>";
                echo "<a href='edit_detail_order.php?id_detail_order={$row['id_detail_order']}'>Edit</a> | ";
                echo "<a href='hapus_detail_order.php?id_detail_order={$row['id_detail_order']}' onclick='return confirm(\"Anda yakin ingin menghapus detail order ini?\")'>Hapus</a>";
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
        <a href="tambah.php">Tambah Detail Order Baru</a>
    </div>
</body>
</html>
