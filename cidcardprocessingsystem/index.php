<?php

 //require_once 'include/header.php';
        
if (isset($_POST['login'])) {
try{
	//checkin empty fields
	if(empty($_POST['ndalogo'])){
		throw new Exception("NDA No is require!");
		
	}else{
		echo htmlspecialchars($_POST['ndalogo']); 
	}
	if(empty($_POST['password'])){
		throw new Exception("password is require!");
		
	}else{
		echo htmlspecialchars($_POST['password']); 
	}  
	 //establishing connection with db and things
	include ('../connection.php');

	// checking login info ontop database
	$row=0;
	$result=mysqli_query($con,"SELECT * from user WHERE NDAno='$_POST[NDAno]' and password='$_POST[password]'");
  $row=mysqli_num_rows($result);
  $row2 = $result->fetch_assoc();
  if($row>0){
  	session_start();
  	$_SESSION['name']="oasis";
  	$_SESSION['ndano'] = $row2['ndano'];
  	header('location:home.php');
  }
  else{
  	throw new Exception("NDA/no or password is wrong,try again!");
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

<h1 style="text-align: center;">CADET IDENTIFICATION CARD <br> PROCESSING SYSTEM.</h1>

<form method="POST">
	<div class="imgcontainer">
		
		<img src="ndalogo.png" alt="Avatar" class="avatar">

		<h2 style="margin: 0;">Login Form</h2>
	</div>
	
	<div class="container">
	<label for="uname"><b>NDA/no</b></label>
	<input type="text" placeholder="Enter NDA No" name="NDAno" required="">

	<label for="psw"><b>password</b></label>
	<input type="password" name="password" placeholder="Enter password" required="">

	<input type="submit" class="btn btn-success col-md-3 col-md-offset-7" style="border-radius: 0%" value="Login" name="login" />	
	</div>
</form>

 <?php
require_once 'include/footer.php';
?>