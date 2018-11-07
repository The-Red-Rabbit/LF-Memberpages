<?php
session_start();
session_destroy();
header("Location: /io/login.php?event=logout");
exit();
?>
