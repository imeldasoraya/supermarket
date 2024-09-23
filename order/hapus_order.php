<!DOCTYPE html>
<html>
<head>
    <title>Hapus Order</title>
</head>
<body>
    <?php
    include "config.php"; // Pastikan path ini sesuai dengan lokasi file config.php pada server Anda

    // Periksa apakah ada id_order yang dikirim via URL
    if (isset($_GET['id_order'])) {
        $id_order = $_GET['id_order'];

        // Prepared statement untuk menghapus data order
        $deleteQuery = "DELETE FROM orders WHERE id_order = ?";
        $stmt = mysqli_prepare($conn, $deleteQuery);

        if ($stmt) {
            // Bind parameter dan eksekusi statement
            mysqli_stmt_bind_param($stmt, "i", $id_order); // "i" untuk tipe data integer
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
        echo "ID order tidak ditemukan!";
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>
</body>
</html>
