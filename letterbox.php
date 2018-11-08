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

    if(!isset($_SESSION['username'])) {
      header("Location: /io/login.php");
      exit();
      die("Bitte erst einloggen");
    }

    //In $name den Wert der Session speichern
    $name = $_SESSION['username'];

    //Text ausgeben
    echo "Nice to have You onboard $name!<br />";
    ?>


    <h3>Letterbox</h3>
    <p>Formulate your thoughts and bellypain anonymously. Message will be send as a private anon-email</p>
    <?php include 'menu.php' ?>
    <script>
    document.getElementsByClassName("active")[0].className = "nav-link";
    document.getElementById("letterbox").className += "active";
    </script>

    <div class="container">

      <div class="text-center">
        <h3>--- Under Construction ---</h3>
      </div>

      <div class="row">

        <div class="col-sm-6">
          <h4>Set up Message</h4>

          <form action="letterbox.php" method="post">
            <div class="form-group">
              <label for="letterText">Topic:</label>
              <input type="text" name="lettersubject" class="form-control" id="letterText" required>
            </div>
            <div class="form-group">
              <label for="letterTextarea">Write down your critisism:</label>
              <textarea name="textletter" class="form-control" id="letterTextarea" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Send Message!</button>
          </form>

        </div>

        <div class="col-sm-6">
          <h4>PHP to Mail</h4>

          <p>
            <?php
            if (isset($_POST['lettersubject'])) {
            $betreff = $_POST['lettersubject'];
            $text = $_POST['textletter'];

            $empfaenger = "mail@felixfelchner.tk";
            $from = "From: Kummer Kasten <mail@felixfelchner.tk>";

            mail($empfaenger, $betreff, $text, $from);
            echo '<div class="alert alert-dismissible alert-info">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Message send!</strong> We will take care of your issue '.$betreff.' soon.
</div>';
          }
            ?>
          </p>

        </div>

      </div>
    </div>







    <hr />
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
