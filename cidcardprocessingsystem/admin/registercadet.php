<?php
ob_start();
session_start();

if($_SESSION['name']!="oasis"){
    
  header('location: ../index.php');
  }
?>
 <?php
include('../connection.php');

//data insertion
  try{
    // data from cadet
    if(isset($_POST['submit'])){

      // student data insertion to database table "student"
      $result = mysqli_query($con, "INSERT INTO user (Ndano, password, fullname, rank, course, department, height) VALUES('$_POST[ndano]', '$_POST[password]','','','','', '')");
   //echo "$_POST[Ndano]";
   //echo "$_POST[password]";
   
      //$Success_msg = "Cadet added sucessfully. ";
      if($result){
        $Success_msg = "cadet added sucessfully";
      }  else{
          $Success_msg ="error";
     }

    }
  }
  catch(Exception $e){
    $error_msg =$e->getmessage();
  }

  ?>
  <!DOCTYPE html>
<html>
<head>
  <title></title>



<meta name="viewport" content="width=device-width, initial-scale-ui">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scale=no, maximum-scale=1.0 minimal-ui"/>

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <script src="/js/bootsrap.min.js"></script> -->
	<script type="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    	<div class="navbar-header">
    	<a class="navbar-brand" href="#">CIDPS</a>	
    	 </div>
   	<ul class=" nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>		
       <li><a href="registercadet.php">Register Cadet</a></li>
     <li><a href="viewcadet.php">View Cadet</a></li>
     <li><a href="logout.php">Logout</a></li>
   	</ul>
    	
    </div>		

	</nav>
  <center>
    <!-- Error or Success Message printint started -->
    <div class="Message">
      <?php if(isset($Success_msg)) echo $Success_msg; if(isset($error_msg)) echo $error_msg; ?>
    </div>
    <!-- error or success message printint endend --->
    <!-- content, tables,forms, Texts, images started -->
  
          
<form method="POST" class="form-horizontal col-md-6 col-md-offset-3">
  <div class="imgcontainer">

    <img src="../ndalogo.png" alt="Avatar" class="avatar">

    <h4 style="margin: 0;">Add CADET Information</h4>
  </div>
  
  <div class="form-group">
  <label for="uname" class="col-sm-3 control-lable" ><b>NDA/no</b></label>
  <div class="col-sm-7">
  <input type="text" class="form-control" id="input1" placeholder="NDA/1001." name="ndano" required="">
 </div>
 <div>
  <label for="input1" class="col-sm-3 control-lable">password</label> </div>
  <div class="col-sm-7">
  <input type="password" class="form-control" id="" name="password" placeholder="Enter password" required="">
</div>
  <input type="submit" class="btn btn-primary col-md-2 col-md-offset-8" style="border-radius: 0%" value="Add CADET" name="submit" /> 
  </div><br>
</form>
</center>

</body>

<!-- body ended -->
