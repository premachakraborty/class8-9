<?php


session_start();
include_once '../database/include.php';

$id= $_GET['id'];

$query = "DELETE FROM posts WHERE id= $id";
$dlt= mysqli_query($include,$query);


if ($dlt) {


$_SESSION['success']= "Your POst Successfully Deleted";
header("location: ../allpost.php");
}else{
	echo "no";
}