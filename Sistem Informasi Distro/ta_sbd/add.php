<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
    <title>Tambah Barang</title>
</head>

<body>
    <a href="index.php">Kembali ke awal</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>ID_BARANG</td>
                <td><input type="int" name="ID_BARANG"></td>
            </tr>
            <tr> 
                <td>NAMA_BARANG</td>
                <td><input type="text" name="NAMA_BARANG"></td>
            </tr>
            <tr> 
                <td>JENIS_BARANG</td>
                <td><input type="text" name="JENIS_BARANG"></td>
            </tr>
            <tr> 
                <td>STOCK</td>
                <td><input type="int" name="STOCK"></td>
            </tr>
            <tr> 
                <td>HARGA</td>
                <td><input type="int" name="HARGA"></td>
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
        $id = $_POST['ID_BARANG'];
        $nama = $_POST['NAMA_BARANG'];
        $jenis = $_POST['JENIS_BARANG'];
        $stock = $_POST['STOCK'];
        $harga = $_POST['HARGA'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO barang VALUES($id,'$nama','$jenis',$stock,$harga)");

        // Show message when user added
        echo "Suksess!!! Barang Telah ditambahkan. <a href='index.php'>Lihat Barang</a>";
    }
    ?>
</body>
</html>
