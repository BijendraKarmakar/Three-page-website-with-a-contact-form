<?php include('server.php');

  if (empty($_SESSION['username'])){
      header('location:login.php');
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/index.css">

	<title>Profile page</title>

	

	<style>

	</style>

</head>

<body>

	<div class="header">
        <h2>Home page</h2>
            
    </div>
    
    <div id="content">
  	    <!-- notification message -->
  	    <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
      	        <h3>
                  <?php 
          	         echo $_SESSION['success']; 
          	         unset($_SESSION['success']);
                  ?>
      	        </h3>
            </div>
  	    <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
    	    <p class="name"><font size=6 >Welcome <strong><?php echo $_SESSION['username']; ?></strong></font></p>
    	    <p class="name"><font size=5 > <a href="index.php?logout='1'" style="color: red;">logout</a> </font> </p>
        <?php endif ?>
        
        <p class="member">
             <a href="contact.php"><font size=4 color=" #2c3e50">Want to contact us</font></a>
        </p>
        
    </div>
	
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script>
	</script>

</body>

</html>