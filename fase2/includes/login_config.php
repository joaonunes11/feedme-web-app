<?php

    if (isset($_POST['login-submit'])) {

        require 'openconn.php'; 
    
        

        $emailuser = $_POST['emailusername'];
        $password = $_POST['password'];

        if (empty($emailuser) || empty($password)) {
            header("Location: ../login.php?error=emptyfields");
            exit();

        } else {
            $query = "SELECT * FROM Users WHERE email = ? OR username = ?;";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("Location: ../login.php?error=sqlerror");
                exit();

            } else {

                mysqli_stmt_bind_param($stmt, "ss", $emailuser, $emailuser);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {
                    $pwdCheck = password_verify($password, $row['password']);
                    
                    if ($pwdCheck == false) {
                        header("Location: ../login.php?error=wrongpwd");
                        exit();

                    } else if ($pwdCheck == true) {
                        session_start();
                        $_SESSION['ID'] = $row['ID'];
                        $_SESSION['username'] = $row['username'];

                        header("Location: ../index.php?login=success");
                        exit();

                    } else {
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                    }

                } else {
                    header("Location: ../login.php?error=nouser");
                    exit();
                }
            }
        }

    } else {
        header("Location: ../index.php");
        exit();
    }
    

    

    

    if(empty($email) || empty($password)){
        header("Location: ../login.php?error=emptyfield&email=".$email."&password=".$password);
    }
    $query = "SELECT username FROM Users WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $query);

    $numRows = mysqli_num_rows($result);

    if($numRows > 0){
        $_SESSION['username'] = $email; 
        header("location:user_page.php");
        
    } else {
        header("location:login.php");
    }


?>