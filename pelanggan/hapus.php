<!DOCTYPE html>
<html>
<head>
    <title>Hapus Pelanggan</title>
</head>
<body>
    <?php
    include "config.php";

    // Periksa apakah ada id_pelanggan yang dikirim via URL
    if (isset($_GET['id_pelanggan'])) {
        $id_pelanggan = $_GET['id_pelanggan'];

        // Query untuk menghapus data pelanggan
        $deleteQuery = "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "Data berhasil dihapus!";
            header("Location: daftar.php"); // Redirect setelah hapus
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ID Pelanggan tidak ditemukan!";
    }
    ?>
</body>
</html>
