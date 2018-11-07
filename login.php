<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Love Foundation Berlin - Online Hub</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <link href = "registration.css" type = "text/css" rel = "stylesheet" />

    <div class="container">
    <?php
    session_start();

    if(isset($_SESSION['username'])) {
      //In $name den Wert der Session speichern
      $name = $_SESSION['username'];

       die("Hello $name, you are already logged in.<br /><a href=\"index.php\">Back Home</a></div>");
    }
    if(isset($_GET['event'])) {
      echo '<p>
        You just logged out sucessfully!
      </p>';
    }
    ?>

      <form class="form-signin" action="/io/encrypt.php" method="post">
        <h2 class="form-signin-heading">LF Berlin - Log In</h2>
        <label for="inputName" class="sr-only">First Name</label>
        <input class="form-control" id="inputName" type="text" name="firstname" placeholder="Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input class="form-control" id="inputPassword" type="password" name="psw" placeholder="Password" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

      <hr />
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
