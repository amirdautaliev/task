<?php 
session_start();
unset($_SESSION["count"]);
header("Location: /task_15.php");
exit;
// $_SESSION["count"] = (int) $_SESSION["count"] +1;



 ?>