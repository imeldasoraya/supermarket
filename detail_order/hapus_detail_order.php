<!DOCTYPE html>
<html>
<head>
    <title>Hapus Detail Order</title>
</head>
<body>
    <?php
    include "config.php"; // Pastikan path ini sesuai dengan lokasi file config.php pada server Anda

    // Periksa apakah ada id_detail_order yang dikirim via URL
    if (isset($_GET['id_detail_order'])) {
        $id_detail_order = $_GET['id_detail_order'];

        // Prepared statement untuk menghapus data detail order
        $deleteQuery = "DELETE FROM detail_orders WHERE id_detail_order = ?";
        $stmt = mysqli_prepare($conn, $deleteQuery);

        if ($stmt) {
            // Bind parameter dan eksekusi statement
            mysqli_stmt_bind_param($stmt, "i", $id_detail_order); // "i" untuk tipe data integer
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
        echo "ID detail order tidak ditemukan!";
    }

    // Tutup koneksi database
    mysqli_close($conn);
    ?>
</body>
</html>
