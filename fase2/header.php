<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="JS/sign-up-business-validation.js"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
  
</head>

<body class="bg-light">

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">FeedMee</h5>
        

        <?php
            if (isset($_SESSION['username'])) {
                echo '<a class="my-2 mx-3 my-sm-0" href=""><i class="fa fa-user" style="font-size:36px;color:green"></i></a>';
                echo '<a class="my-2 mx-3 my-sm-0" href="includes/logout.php"><i class="fa fa-sign-out" style="font-size:36px;color:black"></i></a>';

            } else {
                /*echo '
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="text" placeholder="Email/Username" aria-label="Email/Username">
                  <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                </form>';*/
                echo '<a class="my-2 mx-3 my-sm-0" href="login.php"><i class="fa fa-sign-in" style="font-size:36px;color:green"></i></a>';
                echo '<a class="my-2 mx-3 my-sm-0" href="sign_up.php"><i class="fa fa-user-plus" style="font-size:36px;color:gray"></i></a>';

            }
        ?>
    
  </div>
  

</body>

</html>