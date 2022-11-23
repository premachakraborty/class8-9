<?php
session_start();


if (isset($_POST['updated'])) {

$id= $_POST['postid'];
$fullname= $_POST['fullname'];
$email= $_POST['email'];
$description= $_POST['description'];

$error=[];


if (empty($fullname)) {
	$error['fullname']= 'Please provide your fullname';
}

if(empty($email)){
	$error['email']= 'Please provide your email address';
}

if(empty($description)){
	$error['description']= 'Please provide your description';
}


if (count($error)==0) {
	include "../database/include.php";

	$query= "UPDATE posts SET 

		fullname='$fullname',
		email='$email',
	    description='$description'
	    WHERE id= $id";



	    $update= mysqli_query($include,$query);
	    $_SESSION['successfully']= "Update successfully created";
	    	header("location: ../allpost.php");
}else{ 
	$_SESSION['error']= $error;
		header("location:  ../edit.php?id=$id");

}



}