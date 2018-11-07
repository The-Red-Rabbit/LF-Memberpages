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

    if(!isset($_SESSION['voteaction']) or isset($_GET['nrvoters'])) { //is this a new voting process?
      $_SESSION['voteaction'] = true;
      $nrvoters = $_GET['nrvoters'];
      $votetype = $_GET['typevote'];
      $question = preg_split("/\\r\\n|\\r|\\n/", $_GET['yonquestion']);
      $optionsfor = $_GET['optionsfor'];
      $options = preg_split("/\\r\\n|\\r|\\n/", $_GET['listoptions']);

      $_SESSION['nrofvoters'] = $nrvoters;
      $_SESSION['typeofvote'] = $votetype;
      $_SESSION['questionyon'] = $question;
      $_SESSION['optionsfortitle'] = $optionsfor;
      $_SESSION['optonsarr'] = $options;

      $_SESSION['voterid'] = 1;
      $voterid = $_SESSION['voterid'];
      $_SESSION['votesarr'] = [];
      $votes = $_SESSION['votesarr'];
    }
    if(isset($_SESSION['voteaction'])) { //get all data for current ongoing election
      $nrvoters = $_SESSION['nrofvoters'];
      $votetype = $_SESSION['typeofvote'];
      $question = $_SESSION['questionyon'];
      $optionsfor = $_SESSION['optionsfortitle'];
      $options = $_SESSION['optonsarr'];
      $voterid = $_SESSION['voterid'];
      $votes = $_SESSION['votesarr'];

    }
    if(isset($_POST['confirmbttn'])) { //handle incoming vote
      $lastvote = $_POST['confirmbttn'];
      $_SESSION['voterid'] = $_SESSION['voterid'] + 1;
      $voterid = $_SESSION['voterid'];
      $votes = $_SESSION['votesarr'];
      array_push($votes, $lastvote);
      $_SESSION['votesarr'] = $votes;

      //echo "Last vote was: {$lastvote}<br />";
      if($nrvoters < $voterid) {
        header("Location: /io/vote.php?outcome=true");
      }
    }







/*
    echo "Type of vote: $votetype<br />";
    echo "<br />";
    echo "<br />Options for: $optionsfor<br />";
    echo "<br />";
    echo "Length of options: ". count($options) ."<br />";
    var_dump($options);*/
    ?>

    <p><small>Voter <?php echo "{$voterid}"." of "."{$nrvoters}"." total voters";?></small></p>


    <script>
    function buttonHandler(buttonid) {
      document.getElementById("confirm").value = buttonid;
      document.getElementById("confirm").style.display = "block";
      document.getElementById("confirm").innerHTML = "Confirm '"+buttonid+"'";
      if (<?php echo "{$nrvoters}";?> < <?php echo "{$voterid}";?>) {
        document.getElementById("confirmform").action = "vote.php?outcome=true";
      }
    }
    function confirmHandler() {

      if (<?php echo "{$nrvoters}";?> < <?php echo "{$voterid}";?>) {

        alert("end of voting-process");

      } else {
        alert(" \n \n \nThank you for your vote!\nPlease give the Device to the next voter\n \n \n \n \n \n \n \n \n \n \n \n \n \n \n ");
      }
    }
    </script>





      <?php
      if (strcmp($votetype,"yesorno") == 0) {
        echo '<h3 style="margin-bottom: 5%;">';
        for ($i = 0; $i < count($question); $i++) {
          echo $question[$i]." ";
        }
        echo '</h3>';

        echo '<form id="confirmform" method="post" action="ballot.php"><button id="confirm" style="display:none; margin-bottom: 5%;" type="submit" name="confirmbttn" onclick="confirmHandler()" class="btn btn-primary btn-block">Confirm</button></form>';

        echo '
        <div class="row">
          <div class="col-sm-6" style="margin-bottom: 25%;">
            <button type="button" value="consent" onclick="buttonHandler(this.value)" class="btn btn-success btn-block">I consent</button>
          </div>
          <div class="col-sm-6" style="margin-bottom: 5%;">
            <button type="button" value="bellypain" onclick="buttonHandler(this.value)" class="btn btn-danger btn-block">I have bellypain</button>
          </div>
        </div>
        ';
      }
      if (strcmp($votetype,"choice") == 0) {
        echo '<h3 style="margin-bottom: 5%;">'.$optionsfor.'</h3><br />';

        echo '<form id="confirmform" method="post" action="ballot.php"><button id="confirm" style="display:none; margin-bottom: 5%;" type="submit" name="confirmbttn" onclick="confirmHandler()" class="btn btn-primary btn-block">Confirm</button></form>';

        echo '<div class="row"> <div class="col-sm-12" style="margin-bottom: 25%;">';
        for ($i = 0; $i < count($options); $i++) {
          echo '<button type="button" value="'.$options[$i].'" onclick="buttonHandler(this.value)" class="btn btn-secondary btn-block">'.$options[$i].'</button>';
        }


        echo '</div> </div>';
      }
      ?>




    <hr />
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
