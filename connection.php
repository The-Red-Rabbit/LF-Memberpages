<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
      // $conn = mysql_connect($servername , $username , $password) or die("unable to connect to host");
       //$sql = mysql_select_db ('testfelix',$conn) or die("unable to connect to database");

       $mysqli = new mysqli($servername, $username, $password, "testfelix");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";


?>
