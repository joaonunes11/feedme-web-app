<?php

    include("openconn.php");
    session_start();

    

    // email and password sent from form 
    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']); 
    
    $sql = "SELECT * FROM user WHERE email = '$email' and pass = '$password'";
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $email and $password, table row must be 1 row
        
    if($count == 1) {
        session_register("email");
        $_SESSION['login_user'] = $email;
        
        header("location: index.php");
    }else {
        $error = "Your Login Email or Password is invalid";
    }
        

?>