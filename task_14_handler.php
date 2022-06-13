<?php 
session_start();
$text = $_POST["text"];
 $pdo = new PDO("mysql:host=localhost;dbname=person","mysql","mysql");
$sql = "INSERT INTO text (text) VALUES (:text)";
$statement=$pdo->prepare($sql);
$statement->execute(['text'=> $text]);

$sql = "SELECT * FROM text WHERE text=:text";
$statement=$pdo->prepare($sql);
$statement->execute(["text"=>$text]);
$text=$statement->fetch(PDO::FETCH_ASSOC);

 $_SESSION["text"]=$text["text"];
  header("Location: /task_14.php");

 
 ?>