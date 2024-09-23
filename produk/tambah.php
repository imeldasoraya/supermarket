<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $id_pemasok = $_POST['id_pemasok'];

    $sql = "INSERT INTO Produk (id_produk, nama, deskripsi, harga, id_pemasok) VALUES ('$id_produk', '$nama', '$deskripsi', '$harga', '$id_pemasok')";

    if ($conn->query($sql) === TRUE) {
        header('Location: daftar.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<link rel="stylesheet" href="styles.css">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    align-items: center;
    height: 65vh; 
    margin: 100; 
}

.container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 90%; 
    max-width: 300px; 
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
    width: 90%; 
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
    width: 90%; 
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
    width: 90%; 
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

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk</h2>
    <form method="post">
        Id_produk: <input type="text" name="id_produk" required><br>
        Nama: <input type="text" name="nama" required><br>
        Deskripsi: <textarea name="deskripsi"></textarea><br>
        Harga: <input type="text" name="harga"><br>
        Id_pemasok: <input type="text" name="id_pemasok"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>