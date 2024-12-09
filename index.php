<?php
require_once 'barangManager.php';
require_once 'customerManager.php';

$barangManager = new BarangManager();
$customerManager = new CustomerManager();

$jumlahBarang = count($barangManager->getBarang());
$jumlahCustomer = count($customerManager->getCustomer());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <header class="top-bar">
            <h1>Dashboard</h1>
        </header>

        <div class="stats-container">
            <div class="stat-box" style="background-color: #007bff;">
                <h2><?php echo $jumlahBarang; ?></h2>
                <p>Barang</p>
            </div>

            <div class="stat-box" style="background-color: #ffc107;">
                <h2><?php echo $jumlahCustomer; ?></h2>
                <p>Customer</p>
            </div>
        </div>
    </div>
</body>
</html>
