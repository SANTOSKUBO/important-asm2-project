<?php
include 'connectDb.php';
session_start();




// This php code for register

if(isset($_POST['submitRegister'])){

   $username = mysqli_real_escape_string($connection, $_POST['username']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $password = mysqli_real_escape_string($connection, md5($_POST['password']));

   $select = mysqli_query($connection, "SELECT * FROM `identify_user` WHERE email = '$email' AND password = '$password'") or die('query failed!!!');
    
   if(mysqli_num_rows($select) > 0){
    $message[] = 'user already exists';
   }else{
      mysqli_query($connection, "INSERT INTO `identify_user`(username, email, password) VALUES('$username', '$email', '$password')") or die('query failed');
      $message[] = 'registered successfully!';
   }

}



?>


<?php 

include 'connectDb.php';
// This php code for login
if(isset($_POST['submitLogin'])){

   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $password = mysqli_real_escape_string($connection, md5($_POST['password']));

   $select = mysqli_query($connection, "SELECT * FROM `identify_user` WHERE email = '$email' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login and register Form</title> 
    <script src="login.js"></script>
</head>
<body>
    <!-- <div class="container">
        <div id="signUp">
            <div class="title">
                <p>Sign In</p>

            </div>
            <div class="Intro">
            
            </div>
           <form action="">
               <input type="text" id="username" placeholder="Username">
               <input type="password" id="password" placeholder="Password">
               <div class="action">
                   <input type="checkbox" id="remember-me">
                   <label for="remember-me">Remember Me</label>
                   <div class="signInBtn">
                       <p>Sign In</p>
                   </div>
               </div>
               
               
           </form>
        </div>
    </div> -->
    <div class="container">
        <?php
                if(isset($message)) {
                foreach($message as $message) {
                    echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
                }
            }
            ?>


<div class="main">  
           

		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="submitRegister">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form action="" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="submitLogin">Login</button>
				</form>
			</div>
	</div>
    </div>

     
    
    
</body>
</html>