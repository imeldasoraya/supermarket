<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_detail_order'])) {
    $id_detail_order = $_GET['id_detail_order'];
    $id_detail_order = mysqli_real_escape_string($conn, $id_detail_order);

    // Query untuk mendapatkan data detail order berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM Detail_Orders WHERE id_detail_order = '$id_detail_order'");

    // Jika data ditemukan
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_detail_order = $_POST['id_detail_order']; // Pastikan nama 'id_detail_order' sesuai dengan yang di-form
    $id_order = $_POST['id_order'];
    $id_produk = $_POST['id_produk'];
    $kuantitas = $_POST['kuantitas'];
    $harga = $_POST['harga'];

    // Sanitasi input untuk menghindari SQL Injection
    $id_detail_order = mysqli_real_escape_string($conn, $id_detail_order);
    $id_order = mysqli_real_escape_string($conn, $id_order);
    $id_produk = mysqli_real_escape_string($conn, $id_produk);
    $kuantitas = mysqli_real_escape_string($conn, $kuantitas);
    $harga = mysqli_real_escape_string($conn, $harga);

    // Query untuk memperbarui data detail order
    $updateQuery = "UPDATE Detail_Orders SET id_order='$id_order', id_produk='$id_produk', kuantitas='$kuantitas', harga='$harga' WHERE id_detail_order='$id_detail_order'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Data berhasil diperbarui!";
        header("Location: daftar.php"); // Redirect setelah update
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID detail order tidak disediakan atau request method tidak didukung.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Order</title>
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
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 0.9em;
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
        <h2>Edit Detail Order</h2>
        <form method="POST" action="">
            <label for="id_detail_order">ID Detail Order:</label>
            <input type="text" id="id_detail_order" name="id_detail_order" value="<?php echo isset($row) ? htmlspecialchars($row['id_detail_order']) : ''; ?>">
            
            <label for="id_order">ID Order:</label>
            <input type="text" id="id_order" name="id_order" value="<?php echo isset($row) ? htmlspecialchars($row['id_order']) : ''; ?>">

            <label for="id_produk">ID Produk:</label>
            <input type="text" id="id_produk" name="id_produk" value="<?php echo isset($row) ? htmlspecialchars($row['id_produk']) : ''; ?>">

            <label for="kuantitas">Kuantitas:</label>
            <input type="number" id="kuantitas" name="kuantitas" value="<?php echo isset($row) ? htmlspecialchars($row['kuantitas']) : ''; ?>">

            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" value="<?php echo isset($row) ? htmlspecialchars($row['harga']) : ''; ?>">

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
