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
  <script>
  function onVoteTypeChance(voteType) {
    var x = document.getElementById("yesornotext");
    var y = document.getElementById("choicetext");
    if (voteType === "yesorno") {
      x.style.display = "block";
      y.style.display = "none";
    }
    if (voteType === "choice") {
      x.style.display = "none";
      y.style.display = "block";
    }

  }
  </script>

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


    <h3>Voting on meetings made easy</h3>
    <p>Use this to have a fair and secret election or vote</p>
    <?php include 'menu.php' ?>
    <script>
    document.getElementsByClassName("active")[0].className = "nav-link";
    document.getElementById("vote").className += "active";
    </script>

    <div class="container">
      <div class="row">
        <div class="col-sm-6" style="margin-bottom: 5%;">
          <h4>Set up the Vote</h4>

          <form action="ballot.php">
            <div class="form-group">
              <label for="exampleFormControlInput1">Number of voters</label>
              <input type="number" name="nrvoters" class="form-control" id="exampleFormControlInput1" placeholder="Total number of voters" required>
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1">Type of Vote</label>
              <select name="typevote" class="form-control" id="exampleFormControlSelect1" size="2" onchange="onVoteTypeChance(this.value)" required>
                <option value="yesorno">Yes or No</option>
                <option value="choice">Choice</option>
              </select>
            </div>

            <div class="form-group" id="yesornotext" style="display: none;">
              <label for="exampleFormControlTextarea1">Yes or No Question</label>
              <textarea name="yonquestion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div id="choicetext" style="display: none;">
              <div class="form-group">
                <label for="exampleFormControlInput2">Options for</label>
                <input type="text" name="optionsfor" class="form-control" id="exampleFormControlInput2" placeholder="Position, Venue, etc">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea2">List options. One option per line</label>
                <textarea name="listoptions" class="form-control" id="exampleFormControlTextarea2" rows="5"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-danger">Start Vote!</button>
          </form>

        </div>
        <div class="col-sm-6 other">
          <h4>Outcome</h4>
          <p>
            <?php
            if (isset($_GET['outcome'])) {
              $votetype = $_SESSION['typeofvote'];
              $votes = $_SESSION['votesarr'];
              if (strcmp($votetype,"yesorno") == 0) {
                $question = $_SESSION['questionyon'];
                echo '<h5 style="margin-bottom: 5%;">';
                for ($i = 0; $i < count($question); $i++) {
                  echo $question[$i]." ";
                }
                echo '</h5>';





                $yesvotes = 0;
                $novotes = 0;
                for ($i = 0; $i < count($votes); $i++) {
                  if (strcmp($votes[$i], "consent") == 0) {
                    $yesvotes++;
                  }
                  if (strcmp($votes[$i], "bellypain") == 0) {
                    $novotes++;
                  }
                }
                $percentyes = ($yesvotes / count($votes))*100;
                $percentno = ($novotes / count($votes))*100;
                echo "We have {$yesvotes} Yes-votes! That is $percentyes percent!<br />";
                echo "We have {$novotes} No-votes! That is $percentno percent!<br />";
                echo '
                <div class="progress">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width:'.$percentyes.'%">
                Consent
                </div>

                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width:'.$percentno.'%">
                Bellypain
                </div>
                </div>
                ';
              }
              if (strcmp($votetype,"choice") == 0) {
                $optionsfor = $_SESSION['optionsfortitle'];
                $outputarr = array_count_values($votes);
                krsort($outputarr);
                echo '<h5 style="margin-bottom: 5%;">'.$optionsfor.'</h5>';
                echo '<table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Option</th>
                      <th scope="col">Votes</th>
                    </tr>
                  </thead>
                  <tbody>';
                  $i = 1;
                foreach($outputarr AS $name => $count) {
                  echo '<tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$name.'</td>
                    <td>'.$count.'</td>
                  </tr>';
                  $i++;
                }
                echo '    </tbody>
                  </table>';
              }
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
