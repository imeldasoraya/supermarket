<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];
    $id_pelanggan = mysqli_real_escape_string($conn, $id_pelanggan);

    // Query untuk mendapatkan data pelanggan berdasarkan id
    $query = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

    // Jika data ditemukan
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pelanggan = $_POST['id_pelanggan']; // Pastikan nama 'id_pelanggan' sesuai dengan yang di-form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Sanitasi input untuk menghindari SQL Injection
    $id_pelanggan = mysqli_real_escape_string($conn, $id_pelanggan);
    $nama = mysqli_real_escape_string($conn, $nama);
    $email = mysqli_real_escape_string($conn, $email);
    $telepon = mysqli_real_escape_string($conn, $telepon);
    $alamat = mysqli_real_escape_string($conn, $alamat);

    // Query untuk memperbarui data pelanggan
    $updateQuery = "UPDATE pelanggan SET nama='$nama', email='$email', telepon='$telepon', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "Data berhasil diperbarui!";
        header("Location: daftar.php"); // Redirect setelah update
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID pelanggan tidak disediakan atau request method tidak didukung.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
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
        <h2>Edit Pelanggan</h2>
        <form method="POST" action="">
            <label for="id_pelanggan">ID Pelanggan:</label>
            <input type="text" id="id_pelanggan" name="id_pelanggan" value="<?php echo isset($row) ? htmlspecialchars($row['id_pelanggan']) : ''; ?>" readonly>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo isset($row) ? htmlspecialchars($row['nama']) : ''; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($row) ? htmlspecialchars($row['email']) : ''; ?>">

            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" value="<?php echo isset($row) ? htmlspecialchars($row['telepon']) : ''; ?>">

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo isset($row) ? htmlspecialchars($row['alamat']) : ''; ?>">

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
