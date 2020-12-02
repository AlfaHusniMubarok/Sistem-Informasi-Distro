<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['ID_BARANG'];
    $nama = $_POST['NAMA_BARANG'];
    $jenis = $_POST['JENIS_BARANG'];
    $stock = $_POST['STOCK'];
    $harga = $_POST['HARGA'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE barang 
    SET NAMA_BARANG='$nama',JENIS_BARANG='$jenis',
    STOCK=$stock,HARGA=$harga WHERE ID_BARANG=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM barang WHERE ID_BARANG=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['NAMA_BARANG'];
    $jenis = $user_data['JENIS_BARANG'];
    $stock = $user_data['STOCK'];
    $harga = $user_data['HARGA'];
}
?>
<html>
<head>  
    <title>Ubah Data Barang</title>
</head>

<body>
    <a href="index.php">Ke Halaman Awal</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>NAMA_BARANG</td>
                <td><input type="text" name="NAMA_BARANG" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>JENIS_BARANG</td>
                <td><input type="text" name="JENIS_BARANG" value=<?php echo $jenis;?>></td>
            </tr>
            <tr> 
                <td>STOCK</td>
                <td><input type="int" name="STOCK" value=<?php echo $stock;?>></td>
            </tr>
            <tr> 
                <td>HARGA</td>
                <td><input type="int" name="HARGA" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="ID_BARANG" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Ubah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
