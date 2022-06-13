<?php 
session_start();

$_SESSION["count"] = (int) $_SESSION["count"] +1;
header("Location: /task_15.php");


 ?>