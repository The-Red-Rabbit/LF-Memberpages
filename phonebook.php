<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Google Sheets API Quickstart</title>
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
    <h3>Google Sheets API Quickstart</h3>
    <p>Testing the integration with Google Drive spread sheets</p>
    <?php include 'menu.php' ?>
    <script>
    document.getElementsByClassName("active")[0].className = "nav-link";
    document.getElementById("phonebook").className += "active";
    </script>

    <div class="row">
      <div class="col-sm-10">
        <p>
          Table with informative content. Google Drive up- and downlink.
        </p>
      </div>
      <div class="col-sm-2">

      </div>
    </div>
    <hr />
  </div>
  <script async defer src="https://apis.google.com/js/api.js"
  onload="this.onload=function(){};handleClientLoad()"
  onreadystatechange="if (this.readyState === 'complete') this.onload()">
  </script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
