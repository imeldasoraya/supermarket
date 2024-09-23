<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $id_produk = mysqli_real_escape_string($conn, $id_produk);

    // Query untuk mendapatkan data produk berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");

    // Jika data ditemukan
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk']; // Pastikan nama 'id_produk' sesuai dengan yang di-form
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $id_pemasok = $_POST['id_pemasok'];

    // Sanitasi input untuk menghindari SQL Injection
    $id_produk = mysqli_real_escape_string($conn, $id_produk);
    $nama = mysqli_real_escape_string($conn, $nama);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $harga = mysqli_real_escape_string($conn, $harga);
    $id_pemasok = mysqli_real_escape_string($conn, $id_pemasok);

    // Query untuk memperbarui data produk
    $updateQuery = "UPDATE produk SET nama='$nama', deskripsi='$deskripsi', harga='$harga', id_pemasok='$id_pemasok' WHERE id_produk='$id_produk'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Data produk berhasil diperbarui!";
        header("Location: daftar.php"); // Redirect setelah update ke halaman daftar produk
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID produk tidak disediakan atau request method tidak didukung.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
            font-size: 1.5em;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-bottom: 3px;
            color: #555;
            font-size: 0.9em;
            text-align: left;
            width: 100%;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 0.9em;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        fieldset {
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
        }
        legend {
            padding: 0 8px;
            color: #333;
            font-size: 1em;
        }
        @media (max-width: 600px) {
            .container {
                padding: 8px;
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Produk</h2>
        <form method="POST" action="">
            <fieldset>
                <label for="id_produk">ID Produk:</label>
                <input type="text" id="id_produk" name="id_produk" value="<?php echo isset($row) ? htmlspecialchars($row['id_produk']) : ''; ?>" readonly>

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo isset($row) ? htmlspecialchars($row['nama']) : ''; ?>">

                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi"><?php echo isset($row) ? htmlspecialchars($row['deskripsi']) : ''; ?></textarea>

                <label for="harga">Harga:</label>
                <input type="text" id="harga" name="harga" value="<?php echo isset($row) ? htmlspecialchars($row['harga']) : ''; ?>">

                <label for="id_pemasok">ID Pemasok:</label>
                <input type="text" id="id_pemasok" name="id_pemasok" value="<?php echo isset($row) ? htmlspecialchars($row['id_pemasok']) : ''; ?>">
            </fieldset>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
