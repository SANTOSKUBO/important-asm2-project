<?php

include 'connectDb.php';
session_start();

$user_id = $_SESSION['user_id'];


if(isset($_GET['logoutProfile'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="user.css">
    <title>Profile</title>
</head>
<body>
    <body>
    <nav>
    <header>
        <div class="logo" > 
        <img src="pngwing.com.png"width="80">
        </div>
        <div class="menu">
        <li><a href="index.php">Home</li>
           <li><a href="">Female</li>
<!-- <ul class="sub-menu">
    <li><a href="">Newest product</a></li> 
    <li><a href="">Collections</a></li>
    <li><a  href=""> Shirt</a></li>
    <li><a href="">T-Shirt</a></li>
    <li><a href="">Tops| Corsets</a></li>
    <li><a href="">Shorts</a></li>
    <li><a href=""> Sweats Shirt</a></li>
    <li><a href="">Blazers</a></li>

</ul> -->

             <li><a href="">Male</li>
           <li><a href="">Sale</li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>
<li><a href=""></a></li>



        </div>
        <div class="other">
            <div class="search-box">
                <button class="btn-search"><i class="fas fa-search"></i></button>
                <input type="text" class="input-search" placeholder="Type to Search...">
            </div>

            <div class="accoutandbtn">
            <li><a class="fa fa-user" href=""></a></li>
            <li><a class="fa fa-shopping-bag" href=""></a></li>
            </div>
           

            
            </div>
       





            </div>

            </div>


    </header>
</nav>
<div class="container">
  <div class="element-animation">
    <!--card-1-->
    <div class="card color-card">
      <ul>
        <li><i class="fas fa-arrow-left i-l w"></i></li>
        <li><i class="fas fa-ellipsis-v i-r w"></i></li>
        <li><i class="far fa-heart i-r w"></i></li>
      </ul>
      <img src="https://images.unsplash.com/photo-1499557354967-2b2d8910bcca?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=7d5363c18112a02ce22d0c46f8570147&auto=format&fit=crop&w=635&q=80%20635w" alt="profile-pic" class="profile">
      <h1 class="title">Bevely Little</h1>
      <p class="job-title"> SENIOR PRODUCT DESIGNER</p>
      <div class="desc top">
        
      </div>
      <a class="btn color-a top" id="logout-btn" href="user.php?logoutProfile=<?php echo $user_id;?>" onclick="return confirm('Are you sure you want to log out');"> Log Out</a>

      <hr>
      <div class="container">
        <div class="content">
          <div class="grid-2">
            <button class="color-b circule"> <i class="fab fa-dribbble fa-2x"></i></button>
            <h2 class="title"></h2>
            <p class="followers">Followers</p>
          </div>
          <div class="grid-2">
            <button class="color-c circule"><i class="fab fa-behance fa-2x"></i></button>
            <h2 class="title"></h2>
            <p class="followers">Followers</p>
          </div>
          <div class="grid-2">
            <button class="color-d circule"><i class="fab fa-github-alt fa-2x"></i></button>
            <h2 class="title"></h2>
            <p class="followers">Followers</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
</body>
<script>
    const imgPosition =document.querySelectorAll (".aspect-ratio-169.img")
    console.log(imgPosition)
</script>
</html>