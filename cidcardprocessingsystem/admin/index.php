<?php

 //require_once 'include/header.php';

if (isset($_POST['login'])) {
try{
	//checkin empty fields
	if(empty($_POST['username'])){
		throw new Exception("username is require!");
		
	}else{
		echo htmlspecialchars($_POST['username']); 
	}
	if(empty($_POST['password'])){
		throw new Exception("password is require!");
		
	}else{
		echo htmlspecialchars($_POST['password']); 
	}
	 //establishing connection with db and things
	include ('../connection.php');

	// checking login info into database
	$row=0;
	$result=mysqli_query($con,"SELECT * from admininfo WHERE username='$_POST[username]' and password='$_POST[password]'");

  $row=mysqli_num_rows($result);
  $found = mysqli_fetch_assoc($result);

  if($row>0){
  	session_start();
  	$_SESSION['name']="oasis";
  	header('location:home.php');
  }

  else{
  	throw new Exception("username or password is wrong,try again!");
  	header('location:index.php');
  }
}
// end of try block
 catch(Exception $e){
	$error_msg=$e->getMessage();
}
  //end of try-catch
}
     

?>
  <?php
    //print error message
  if(isset($error_msg)){
  	echo $error_msg;
  }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale-ui">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scale=no, maximum-scale=1.0 minimal-ui"/>

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script src="/js/bootsrap.min.js"></script> -->
	<script type="bootstrap/js/bootstrap.min.js"></script>

<h1 style="text-align: center;">CADET IDENTIFICATION CARD <br> PROCESSING SYSTEM.</h1>
          
<form method="POST">
	<div class="imgcontainer">
		<img src="../ndalogo.png" alt="Avatar" class="avatar">
		<h2 style="margin: 0;">Admin Login</h2>
	</div>
	
	<div class="container">
	<label for="uname"><b>NDA/no</b></label>
	<input type="text" placeholder="Enter username" name="username" required="">

	<label for="psw"><b>password</b></label>
	<input type="password" name="password" placeholder="Enter password" required="">

	<input type="submit" class="btn btn-success col-md-3 col-md-offset-7" style="border-radius: 0%" value="Login" name="login" />	
	</div>
</form>

 <?php
//require_once 'include/footer.php';
//?>