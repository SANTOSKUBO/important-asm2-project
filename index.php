
<?php
include 'connectDb.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['buy_to_cart'])){

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['img'];
    $product_quantity = $_POST['quantity'];
 
    $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($select_cart) > 0){  
       $message[] = 'product already added to cart!';
    }else{
       mysqli_query($connection, "INSERT INTO `cart`(user_id, name, price, img, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
       $message[] = 'product added to cart!';
       header('location:cart.php');
    }
 
 }; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleindex.css">
    <script src="./index.js"></script>    
    <title>Coin Project</title>
</head>
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
                <input oninput="searchItem();" type="text" class="input-search" placeholder="Type to Search...">
            </div>

            <div class="accoutandbtn">
                <li><a class="fa fa-user" href="user.php"></a></li>
                <li><a class="fa fa-shopping-bag" href="cart.php"></a></li>
            </div>
        </div>
    </header>
    
</nav>
<!-- <section>
    
</section> -->
<div id="all-products">
        <?php
         $select_product = mysqli_query($connection, "SELECT * FROM `product`") or die('query failed');
            if(mysqli_num_rows($select_product) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_product)){
        ?>
            <div class="product--wrapper">
                <div class="card">
                    <form action="" method="post">
                            <div class="card_heart">
                                <i class='bx bx-heart'></i>
                            </div>
                            <div class="card_cart"> 
                                <i class='bx bx-cart-alt'></i>
                            </div>
                            <div class="card_img">
                                <input type="hidden" name="img" value="<?php echo $fetch_product['img']; ?>">
                                <img src="<?php echo $fetch_product['img']; ?>" alt="">
                            </div>
                            <div class="card_title">
                                <input type="hidden" name="name" value="<?php echo $fetch_product['Name']; ?>">
                                <div class="name"><p class="itemName"><?php echo $fetch_product['Name']; ?></p></div>
                            </div>
                            <div class="card_price">
                                <input type="hidden" name="price" value="<?php echo $fetch_product['Price']; ?>">
                                <div class="price">$<?php echo $fetch_product['Price']; ?></div>  
                            </div>
                        <div class="card_color">
                            <h3>Color:</h3>
                            <span class="card_color_green"></span>
                            <span class="card_color_red"></span>
                            <span class="card_color_blue "></span>
                        </div>

                        <div class="card_action">
                            <button type="submit" name="buy_to_cart">Buy Now</button>
                            <button type="submit" name="add_to_cart">Add Cart</button>
                            <input type="number" min="1" name="quantity" value="1">
                        </div>
                         
         <!-- <input type="hidden" name="product_img" value="<?php echo $fetch_product['img']; ?>">
         <input type="hidden" name="product_title" value="<?php echo $fetch_product['Name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_product['Price']; ?>"> -->
         
                    </form>
                </div>
            </div>
   
             <?php
                };
            };
        ?>  
   </div>
  
   

    <!-- <section id="Slider">
        <div class="aspect-ratio-169">
            <img src="coin.img/1ed92bcb50e9415592868dc40114f18e.jpeg">
            <img src="coin.img/840fdb7e51a54cb79b2c07be8030c7ff.jpeg">
            <img src="coin.img/202110011829-main.jpg">
            <img src="coin.img/ethereum-logo-portrait-black-gray.png">
        </div>
    </section> -->
        <!-- <div class="container">

                <div class="slider tittle col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="slider__images">
                        <div class="slider__img-container">
                            <img src="coin.img/202110011829-main.jpg" alt="">
                        </div>
                        <div class="slider__img-container">
                            <img src="coin.img/840fdb7e51a54cb79b2c07be8030c7ff.jpeg" alt="">
                        </div>
                        <div class="slider__img-container">
                            <img src="coin.img/c6270b05c7734f0280b170370116e71c.jpeg" alt="">
                        </div>
                    </div>
                </div> 
        </div> -->
           
       <!-- <div class="st first"> <img src="coin.img/ethereum-logo-portrait-black-gray.png" ></div>   
          <div class="st "> <img src="coin.img/etherec6270b05c7734f0280b170370116e71c.jpeg"></div> 
           <div class="st "> <img src="coin.img/1ed92bcb50e9415592868dc40114f18e.jpeg"> </div>
           <div class="st "> <img src="coin.img/202110011829-main.jpg"></div>
           <div class="st "><img src="coin.img/840fdb7e51a54cb79b2c07be8030c7ff.jpeg"></div>
     -->
     <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">our services</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 				<li><a href="#">affiliate program</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">shipping</a></li>
  	 				<li><a href="#">returns</a></li>
  	 				<li><a href="#">order status</a></li>
  	 				<li><a href="#">payment options</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>online shop</h4>
  	 			<ul>
  	 				<li><a href="#">watch</a></li>
  	 				<li><a href="#">bag</a></li>
  	 				<li><a href="#">shoes</a></li>
  	 				<li><a href="#">dress</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
 
 



</body>
<script>
    const imgPosition =document.querySelectorAll (".aspect-ratio-169.img")
    console.log(imgPosition)
</script>


</html>
