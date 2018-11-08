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


    <h3>Create random groups of people</h3>
    <p>Group up people on meetings or seminars:</p>
    <?php include 'menu.php' ?>
    <script>
    document.getElementsByClassName("active")[0].className = "nav-link";
    document.getElementById("group").className += "active";
    </script>

    <div class="container">

      <div class="text-center">
        <h3>--- Under Construction ---</h3>
      </div>

      <div class="row">

        <div class="col-sm-6">
          <h4>Set up Grouping</h4>

          <form action="group.php">
            <div class="form-group">
              <label for="nrofgroups">Number of groups</label>
              <input type="number" name="nrgroups" class="form-control" id="nrofgroups" placeholder="Total number of groups" required>
            </div>
            <div class="form-group">
              <label for="peopleTextarea">List people. One person-name per line</label>
              <textarea name="listpeople" class="form-control" id="peopleTextarea" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Start Grouping!</button>
          </form>

        </div>

        <div class="col-sm-6">
          <h4>Outcome</h4>

          <p>
            <?php
            $nrgroups = $_GET['nrgroups'];
            $options = preg_split("/\\r\\n|\\r|\\n/", $_GET['listpeople']);
            var_dump($nrgroups);
            var_dump($options);
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
