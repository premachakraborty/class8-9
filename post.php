<?php
session_start();

include '../database/include.php';


if (isset($_POST['submit'])) {

	$error=[];

	
$request= $_POST;
$fullname= $request['fullname'];
$email= $request['email'];
$description= $request['description'];


    


if (empty($fullname)) {
	$mgs= "Please provide a name";
	$error['fullname']=$mgs;
}elseif (strlen($fullname)>10) {
	$mgs= "Name cannot be given more";
	$error['fullname']=$mgs;
}
if (empty($email)) {
	$mgs= "Please provide a email address";
	$error['email']=$mgs;
}
if (empty($description)) {
	$mgs= "Please provide a description";
	$error['description']=$mgs;
}

if (count($error)>0) {

	  $_SESSION['error'] = $error;
	   $_SESSION['old_data'] = $request;
     header("Location: ../index.php");

}else{
	$query="INSERT INTO posts( fullname, email, description) VALUES ('$fullname','$email','$description')";

	
	$post=mysqli_query($include,$query);
	if ($post) {
		header("Location: ../index.php");
		$_SESSION['success'] = "Your account successfully created!";
	}else
	echo "error";
}


}else{
	echo "Click on the submit button";
}