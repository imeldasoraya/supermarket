<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pemasok = $_POST['Id_pemasok'];
    $nama = $_POST['Nama'];
    $kontak = $_POST['Kontak'];
   
    $sql = "INSERT INTO Pemasok (Id_pemasok, Nama, Kontak) VALUES ('$id_pemasok', '$nama', '$kontak')";

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
    <title>Tambah Pemasok</title>
</head>
<body>
    <h2>Tambah Pemasok</h2>
    <form method="post">
        Id_pemasok: <input type="text" name="Id_pemasok" required><br>
        Nama: <input type="text" name="Nama" required><br>
        Kontak: <input type="text" name="Kontak" required><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>