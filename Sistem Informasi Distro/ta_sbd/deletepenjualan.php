<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete barang row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM penjualan WHERE ID_PENJUALAN = $id");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:penjualan.php");
?>
