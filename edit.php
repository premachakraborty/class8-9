
<?php

session_start();

include "./database/include.php";
$id=$_GET['id'];
$query="SELECT * FROM posts WHERE id= $id";
$result=mysqli_query($include,$query);
$post=mysqli_fetch_assoc($result);



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







<div class="container">
  <div class="col-6 mx-auto mt-5">
<div class="card">
  <div class="card-header">
    <strong>Edit Post</strong>
  </div>
  <div class="card-body">

<form action="./post/update.php" method="POST">
  <input type="hidden" name="postid" value="<?= $post["id"]?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input value="<?= $post["fullname"]?>" type="text" name="fullname" class="form-control" id="exampleInputEmail1">
       <?php
                            if (isset($_SESSION['error']['fullname'])) {
                            ?>
                                <span class="text-danger">
                                    <?php

                                    echo $_SESSION['error']['fullname']
                                    ?>
                                </span>
                            <?php
                            }
                            ?>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email Address</label>
    <input type="email" value="<?= $post["email"]?>" name="email" class="form-control" id="exampleInputPassword1">
     <?php
                            if (isset($_SESSION['error']['email'])) {
                            ?>
                                <span class="text-danger">
                                    <?php

                                    echo $_SESSION['error']['email']
                                    ?>
                                </span>
                            <?php
                            }
                            ?>
  </div>
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Your Description</label>
    <textarea name="description" class="form-control"><?= $post["description"]?> </textarea>
     <?php
                            if (isset($_SESSION['error']['description'])) {
                            ?>
                                <span class="text-danger">
                                    <?php

                                    echo $_SESSION['error']['description']
                                    ?>
                                </span>
                            <?php
                            }
                            ?>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="updated" class="btn btn-warning w-100">Update</button>
</form>
  </div>

</div>
</div>
</div>





















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<?php

session_unset();

?>