<?php 
  include 'connectDb.php';
  session_start();
  $user_id = $_SESSION['user_id'];

  if(!isset($user_id)){
      header('location:login.php');
  }

  
  
  if(isset($_POST['update-products'])){
        $update_quantity = $_POST['quantity_product'];
        $update_id = $_POST['id_product'];
        mysqli_query($connection, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('update failed!');
        $message[] = 'Update product successfully!';
  }

  if(isset($_GET['removeItem'])){

    $remove_product_id = $_GET['removeItem'];
    mysqli_query($connection, "DELETE FROM `cart` WHERE 
    id = '$remove_product_id'") or die('delete failed!');
    // header('location:cart.php');

  }

  if(isset($_GET['deleteAll'])){
    mysqli_query($connection, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
   

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
    <script src="index.js"></script>
    <script src="cart.js"></script>
    <link rel="stylesheet" href="cart.css">
    <title>Coin Project</title>
</head>
<body>
    <nav>
    <header>
        <div class="logo" > 
        <img src="pngwing.com.png">
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
                  <li><a href="">About</li>
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
            <li><a class="fa fa-user" href="user.php"></a></li>
            <li><a class="fa fa-shopping-bag" href=""></a></li>
            </div>
           

            
        </div>
    </header>
    
</nav>
      
            <div class="cart--wrapper">
              <div class="cart-container">
              <div class="heading">
                <h1>
                  <span class="shopper"></span> Shopping Cart
                </h1>
                
                <a href="#" class="visibility-cart transition is-open">X</a>    
              </div>
              
              <div class="cart transition is-open">
                
                
                
                
                <div class="table">
                  
                  <div class="layout-inline row th">
                    <div class="col col-pro">Product</div>
                    <div class="col col-price align-center "> 
                      Price
                    </div>
                    <div class="col col-qty align-center">QTY</div>
                    <div class="col">total</div>
                    <div class="col">options</div>
                  </div>

                    <?php
                      $select_cart = mysqli_query($connection, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die ('error');
                      if(mysqli_num_rows($select_cart) > 0){
                          while($take_product = mysqli_fetch_assoc($select_cart)) {
                    ?>
                        <form action="" method="post">
                        <div class="layout-inline row">
                              <div class="col col-pro layout-inline">
                                <img src="<?php echo $take_product['img'];?>" alt="kitten" />
                                <input type="hidden" name="id_product" value="<?php echo $take_product['id']?>">
                                <p><?php echo $take_product['name'];?></p>
                              </div>
                              
                              <div class="col col-price col-numeric align-center ">
                                  <p>$<?php echo $take_product['price'];?></p>
                              </div>

                              <div class="col col-qty layout-inline">
                                <a href="#" class="qty qty-minus">-</a>
                                  <input type="numeric" name="quantity_product" value="<?php echo $take_product['quantity']?>" />
                                <a href="#" class="qty qty-plus">+</a>
                              </div>
                              
                              <div class="col col-vat col-numeric">
                                 <p>$<?php 
                                  $totalPrice = $take_product['price'] * $take_product['quantity'];
                                  $sum_total = $totalPrice + $totalPrice + 30;
                                  echo $totalPrice;
                                ?> </p>
                              </div>
                              <div class="col col-total col-numeric">               
                                  <a href="cart.php?removeItem=<?php echo $take_product['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this item?')">
                                    <span><ion-icon name="trash" class="delete-icon"></ion-icon></span>
                                  </a>
                                   <input type="submit" class="btn btn-update" name="update-products" value="Update cart">
                              </div>
                              
                          </form>
                  </div>
                      <?php 
                    };
                  };
                ?>
                  
                  <!-- <div class="layout-inline row row-bg2">

                    <div class="col col-pro layout-inline">
                      <img src="http://lovemeow.com/wp-content/uploads/2012/05/kitten81.jpg" alt="kitten" />
                      <p>Scared Little Kittie</p>
                    </div>
                    
                    <div class="col col-price col-numeric align-center ">
                      <p>£23.99</p>
                    </div>

                    <div class="col col-qty  layout-inline">
                      <a href="#" class="qty qty-minus ">-</a>
                        <input type="numeric" value="1" />
                      <a href="#" class="qty qty-plus">+</a>
                    </div>
                    
                    <div class="col col-vat col-numeric">
                      <p>£1.95</p>
                    </div>
                    <div class="col col-total col-numeric">
                      <p>£25.94</p>
                    </div>      
                  
                  </div> -->
<!--                   
                  <div class="layout-inline row">
                    
                    <div class="col col-pro layout-inline">
                      <img src="http://cdn.cutestpaw.com/wp-content/uploads/2012/04/l-my-first-kitten.jpg" alt="kitten" />
                      <p>Curious Little Begger</p>
                    </div>
                    
                    <div class="col col-price col-numeric align-center ">
                      <p>£59.99</p>
                    </div>

                    <div class="col col-qty layout-inline">
                      <a href="#" class="qty qty-minus">-</a>
                        <input type="numeric" value="3" />
                      <a href="#" class="qty qty-plus">+</a>
                    </div>
                    
                    <div class="col col-vat col-numeric">
                      <p>£2.95</p>          
                    </div>
                    <div class="col col-total col-numeric">  
                      <p>£182.95</p>
                    </div>         
                  </div> -->
              
                  <div class="tf">
                    <div class="row layout-inline">
                      <div class="col">
                        <p>VAT</p>
                      </div>
                      <div class="col">
                          $30
                      </div>
                    </div>
                    <div class="row layout-inline">
                      <div class="col">
                        <p>Shipping</p>
                      </div>
                      <div class="col"></div>
                    </div>
                      <div class="row layout-inline">
                      <div class="col">
                        <p>Total</p>
                      </div>
                      <div class="col">
                          <?php
                              echo '<p> $ '.$sum_total. '</p>;' 
                          ?>
                      </div>
                    </div>
                  </div>         
              </div>
                <a href="#" class="btn btn-update">Update cart</a>
            </div>
            <div class="delete-all">
              <a href="cart.php?deleteAll" onclick="return confirm('Are you sure to want delete all products from your cart?');" class="deleteAll">Delete all products</a>
            </div>
</div>



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
  	 </div>s
</footer>
 






<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
<script>
    const imgPosition =document.querySelectorAll (".aspect-ratio-169.img")
    console.log(imgPosition)
</script>


</html>