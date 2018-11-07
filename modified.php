<?php

include "connection.php";
/*
if(isset($_GET['id'])){
$sql = "delete from registration where id = '".$_GET['id']."'";
$result = mysqli_query($sql);
}*/

//$sql = "select * from registration";
//$result = mysqli_query($sql);



if ($result = mysqli_query($mysqli, "SELECT * FROM registration LIMIT 10")) {
    printf("Select returned %d rows.<br>", mysqli_num_rows($result));
    while ($row = mysqli_fetch_row($result)) {
       printf ("%s (%s) (%s) (%s)\n", $row[0], $row[1], $row[2], $row[3]);
   }
    /* free result set */
    mysqli_free_result($result);
}
?>
<html>
    <body>
        <table width = "100%" border = "1" cellspacing = "1" cellpadding = "1">
            <tr>
                <td>Id</td>
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
                <td>Password</td>

                <td colspan = "2">Action</td>
            </tr>
        </table>
    </body>
</html>
