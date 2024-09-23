<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Supermarket</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Tambahkan CSS di sini */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFF0F5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }
        header {
            background-color: #6a1b9a;
            color: white;
            padding: 50px;
            text-align: center;
            width: 92.2%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center; /* Menjaga tulisan tetap di tengah */
            align-items: center;
            position: relative; /* Menggunakan positioning relatif */
        }
        header h1, header p {
            margin: 0;
            text-align: center; /* Menjaga tulisan tetap di tengah */
        }
        .logout-container {
            position: absolute; /* Menggunakan posisi absolut */
            right: 30px; /* Jarak dari tepi kanan */
            top: 30%; /* Pusatkan secara vertikal */
            transform: translateY(-50%); /* Pusatkan secara vertikal */
        }
        .btn {
            padding: 10px 20px;
            background-color: white; /* Warna tombol logout */
            color: #008080; /* Warna teks tombol */
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none; /* Menghapus underline */
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn:hover {
            background-color: #708090; /* Warna hover */
            color: white;
        }
        /* CSS lainnya */
        nav {
            background-color: #e1bee7; /* Warna ungu pastel */
            width: 100%;
            text-align: center;
            padding: 25px 0;
            margin-top: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 15px; /* Jarak antar item */
        }
        nav ul li {
            margin: 0;
        }
        nav ul li a {
            color: #6a1b9a;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #fff;
            display: block;
            border-radius: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        nav ul li a:hover {
            background-color: #6a1b9a;
            color: white;
        }
        section {
            padding: 20px;
            text-align: center;
            width: 80%;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            border-radius: 10px;
            max-width: 800px; /* Membatasi lebar maksimum */
        }
        footer {
            margin-top: auto;
            padding: 25px;
            text-align: center;
            background-color: #6a1b9a;
            color: white;
            width: 96.1%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <div>
            <h1>Selamat Datang di Manajemen Supermarket</h1>
            <p>Kelola data pelanggan, produk, order, detail order dan pemasok dengan mudah dan cepat.</p>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="pelanggan/daftar.php">Pelanggan</a></li>
            <li><a href="produk/daftar.php">Produk</a></li>
            <li><a href="order/daftar.php">Order</a></li>
            <li><a href="detail_order/daftar.php">Detail Order</a></li>
            <li><a href="pemasok/daftar.php">Pemasok</a></li>
        </ul>
    </nav>

    <section class="intro">
        <h2>Manajemen Data</h2>
        <p>Klik pada salah satu kategori di atas untuk mulai mengelola data Anda.</p>
    </section>

    <footer>
        <p>&copy; 2024 Supermarket Sederhana. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
