<!DOCTYPE html>
<html>
<head>
    <title>Hapus Produk</title>
</head>
<body>
    <?php
    include "config.php"; // Ubah path ini jika diperlukan untuk mencocokkan lokasi file config.php

    // Periksa apakah ada id_produk yang dikirim via URL
    if (isset($_GET['id_produk'])) {
        $id_produk = $_GET['id_produk'];

        // Prepared statement untuk menghapus data produk
        $deleteQuery = "DELETE FROM produk WHERE id_produk = ?";
        $stmt = mysqli_prepare($conn, $deleteQuery);

        if ($stmt) {
            // Bind parameter dan eksekusi statement
            mysqli_stmt_bind_param($stmt, "i", $id_produk); // "i" untuk tipe data integer
            if (mysqli_stmt_execute($stmt)) {
                // Redirect setelah hapus
                header("Location: daftar.php");
                exit(); // Menghentikan eksekusi skrip untuk memastikan header terkirim
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
            // Tutup statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ID Produk tidak ditemukan!";
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>
</body>
</html>
