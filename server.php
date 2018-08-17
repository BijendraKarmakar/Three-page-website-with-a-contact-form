<?php 
    
    session_start();
    
    $errors = array();

    // Connect to the database

    $db = mysqli_connect('localhost', 'root', 'password', 'registration');

    //when register button is clicked

    if (isset($_POST['register'])){
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
        
        
        // if the password does not match
        if ($password_1 != $password_2){
            array_push($errors, "The two passwords does not match");
        }
        
        
        // if the user exist with same username or email 
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
  
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
        
        // if there are no errors then save user to the database
        
        if (count($errors) == 0) {
  	        $password = md5($password_1);
            
            $sql = "INSERT INTO users (firstname, lastname, username, email, password) 
                            VALUES ('$firstname', '$lastname', '$username', '$email', '$password')"; 
            
            mysqli_query($db, $sql);
            
           $_SESSION['username'] = "Your account has been successfully created please login to view your profile";
  	       header('location: login.php');
            
        }
        
    }

    // LOGIN USER
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
  	    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	    $results = mysqli_query($db, $query);
        
  	    if (mysqli_num_rows($results) == 1) {
  	        $_SESSION['username'] = $username;
  	        $_SESSION['success'] = "You are now logged in";
  	        header('location: index.php');
  	    }else {
  		    array_push($errors, "Wrong username or password");
  	    }
    }
}


        //log out
        if (isset($_GET['logout'])){
            session_destroy();
            unset($_SESSION['username']);
            header('location: login.php');
        }




?>




