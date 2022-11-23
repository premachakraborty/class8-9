<?php

include "./database/include.php";

$request= $_GET;
$id= $request['id'];
$query="SELECT * FROM posts WHERE id= '$id'";
$data=mysqli_query($include,$query);
$post=mysqli_fetch_assoc($data);

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

<div class="container mt-5">
	<h1>Show Post</h1>
  <div class="card">
    <div class="card-header">
      FullName = <?= $post['fullname'] ?>
        
  
    </div>
    <div class="card-body">
      Email= <?= $post['email'] ?>

    </div>
    <div class="card-footer">
      Description =  <?= $post['description'] ?>
       
    </div>
  </div>

</div>

  



  	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>