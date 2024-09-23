<!DOCTYPE html>
<html>
<head>
    <title>Hapus Pemasok</title>
</head>
<body>
    <?php
    include "config.php";

    // Periksa apakah ada id_pemasok yang dikirim via URL
    if (isset($_GET['id_pemasok'])) {
        $id_pemasok = $_GET['id_pemasok'];

        // Query untuk menghapus data pemasok
        $deleteQuery = "DELETE FROM pemasok WHERE id_pemasok='$id_pemasok'";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "Data berhasil dihapus!";
            header("Location: daftar.php"); // Redirect setelah hapus
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "ID Pemasok tidak ditemukan!";
    }
    ?>
</body>
</html>
