<?php
require_once 'customer.php';
require_once 'customerManager.php';

$customerManager = new CustomerManager();

// Menangani form tambah customer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $customerManager->tambahCustomer($nama, $email, $telepon);
    header('Location: indexcustomer.php'); // Redirect untuk mencegah resubmission
    exit;
}

// Menangani penghapusan customer
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $customerManager->hapusCustomer($id);
    header('Location: indexcustomer.php'); // Redirect setelah dihapus
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Customer</title>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">
</head>
<body>

<div class="sidebar">
        <div class="profile-section">
            <img src="ha.jpg" alt="User" class="profile-pic">
            <h3>Hangesa (Admin)</h3>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" class="active">Dashboard</a></li>
            <li><a href="indexbarang.php">Barang</a></li>
            <li><a href="indexcustomer.php">Customer</a></li>
        </ul>
    </div>
    

<div class="main-content">
    <div class="container">
        <h1>Pencatatan Customer</h1><br>
        <form method="POST" action="">
            <div>
                <label for="nama">Nama Customer:</label><br>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="email">Email Customer:</label><br>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="telepon">Telepon Customer:</label><br>
                <input type="text" id="telepon" name="telepon" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-add">Tambah Customer</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customerManager->getCustomer() as $customer): ?>
                    <tr>
                        <td><?= $customer['id'] ?></td>
                        <td><?= $customer['nama'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['telepon'] ?></td>
                        <td>
                            <a href="?hapus=<?= $customer['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
