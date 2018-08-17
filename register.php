<?php 
    include("server.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">

	<title>Simple Registration and Login Page using php and mysql</title>

	

	<style>

	</style>

</head>

<body>

	<div class="header">
        <h2>Registration</h2>
            
    </div>
	
	<form action="register.php" method="post">
   
        <?php include('errors.php'); ?>       
    
        <div class="input-group">
            <input type="text" name="firstname" placeholder="first name" required data-validation-required-message>
        </div>
        
        <div class="input-group">
            <input type="text" name="lastname" placeholder="last name" required data-validation-required-message>
        </div>
        
        <div class="input-group">
            <input type="text" name="username" placeholder="user name" required data-validation-required-message>
        </div>
        
        <div class="input-group">
            <input type="text" name="email" placeholder="email" required data-validation-required-message>
        </div>
        
        <div class="input-group">
            <input type="password" name="password_1" placeholder="password" required data-validation-required-message>
        </div>
        
        <div class="input-group">
            <input type="password" name="password_2" placeholder="confirm password" required data-validation-required-message>
        </div>
        
        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button> 
        </div>
        
        <p class="member">
            Already a member? <a href="login.php">Sign in</a>
        </p>
    
	    
	</form>
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
	</script>

</body>

</html>
