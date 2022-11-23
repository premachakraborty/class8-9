
<?php
session_start();

$query= "SELECT * FROM posts";
include "./database/include.php";

$data=mysqli_query($include,$query);

$posts=mysqli_fetch_all($data,1);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Post System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allpost.php">All Post</a>
        </li>
       
      </ul>
    </div>
  </div>
</nav>
<?php
if (isset($_SESSION['success'])) {

  ?>
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; bottom: 20px;right: 20px;">
  <div class="toast-header">

    <strong class="me-auto">Post System</strong>
   
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
   <?= $_SESSION['success']?>
  </div>
</div>
<?php
}
?>

<div class="container mt-5">
	<h1>All Post</h1>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Email</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<?php
foreach($posts as $key=>$post){

?>
<tbody>
    <tr>

      <th scope="row"><?= ++$key ?></th>
      <td><?= $post['fullname'] ?></td>
      <td><?= $post['email'] ?></td>
      <td><?= strlen($post['description'])>50? substr($post['description'],0,50).'...' : $post['description'] ?></td>
      <td>
      <div class="btn-group">
      	<a href="./show.php ?id= <?= $post['id'] ?>" class="btn btn-primary">SHOW</a>
      	<a href="./edit.php ?id= <?= $post['id'] ?>" class="btn btn-warning">EDIT</a>
      	<a href="./post//delete.php ?id= <?= $post['id'] ?>" class="btn btn-danger">DELETE</a>
      </div>
  </td>
    </tr>
    
  </tbody>
  <?php
	
}

?>


<?php

if (mysqli_num_rows($data)==0) {
  ?>
 <tr class="text-center">
<td colspan="5">Post not found</td>
 </tr>
 <?php
}


?>
  
</table>


  	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

<?php
session_unset();
?>
