<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
    <title>Tambah data penjualan</title>
</head>

<body>
    <a href="penjualan.php">Kembali ke penjualan</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form action="addpenjualan.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>ID_PENJUALAN</td>
                <td><input type="int" name="ID_PENJUALAN"></td>
            </tr>
            <tr> 
                <td>ID_BARANG</td>
                <td><input type="text" name="ID_BARANG"></td>
            </tr>
            <tr> 
                <td>JUMLAH</td>
                <td><input type="text" name="JUMLAH"></td>
            </tr>
            <tr> 
                <td>ID_PENGGUNA</td>
                <td><input type="int" name="ID_PENGGUNA"></td>
            </tr>
            <tr> 
                <td>ID_CUSTOMER</td>
                <td><input type="int" name="ID_CUSTOMER"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['ID_PENJUALAN'];
        $bar = $_POST['ID_BARANG'];
        $jum = $_POST['JUMLAH'];
        $peng = $_POST['ID_PENGGUNA'];
        $cus = $_POST['ID_CUSTOMER'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjualan VALUES($id,$bar,$jum,$peng,$cus)");

        // Show message when user added
        echo "Suksess!!! Data penjualan berhasil ditambahkan. <a href='penjualan.php'>Lihat Data</a>";
    }
    ?>
</body>
</html>
