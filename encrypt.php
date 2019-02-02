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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

  <div class="container">

  <?php
  session_start();
  $vorname = $_POST['firstname'];
  $passwort = $_POST['psw'];





  echo "<p>
    Hello $vorname,
  </p>";



  //default password: love
  $hash = '$2y$10$vWxUwkC958YYUVd/ZIMy7OfJrHabZasPipnU1TiNaXxpSRrEsD7K.';

  if (password_verify($passwort, $hash)) {

    if(!isset($vorname) OR empty($vorname)) {
      $vorname = "Gast";
    }

    //Session registrieren
    $_SESSION['username'] = $vorname;

header("Location: index.php");//change it later directly to index.php
exit();


  } else {

    echo "<p>
      Your password <em>$passwort</em> is wrong or misspelled.<br />Please try again!
    </p>";
    echo '<button type="button" class="btn btn-primary" onclick="relocate_home()"><i class="fas fa-arrow-left"></i> Back</button>';

  }


  ?>
  <hr />

  </div>

  <script>
  function relocate_home()
  {
       location.href = "index.php";
  }
  </script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
