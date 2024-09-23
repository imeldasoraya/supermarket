<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "supermarket";

// Membuat koneksi ke database
$conn = new mysqli("localhost", "root", "", "supermarket");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
