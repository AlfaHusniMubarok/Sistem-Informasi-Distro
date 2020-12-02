<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
    <title>Tambah data customer</title>
</head>

<body>
    <a href="customer.php">Kembali ke customer</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form action="addcustomer.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>ID_CUSTOMER</td>
                <td><input type="int" name="ID_CUSTOMER"></td>
            </tr>
            <tr> 
                <td>ALAMAT</td>
                <td><input type="text" name="ALAMAT"></td>
            </tr>
            <tr> 
                <td>NAMA_CUSTOMER</td>
                <td><input type="text" name="NAMA_CUSTOMER"></td>
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
        $id2 = $_POST['ID_CUSTOMER'];
        $alamat = $_POST['ALAMAT'];
        $name = $_POST['NAMA_CUSTOMER'];
        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO customer VALUES($id2,$alamat,$name)");

        // Show message when user added
        echo "Suksess!!! Data customer berhasil ditambahkan. <a href='customer.php'>Lihat Data</a>";
    }
    ?>
</body>
</html>
