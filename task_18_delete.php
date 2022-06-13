<?php


$id = $_GET["id"];


$pdo = new PDO("mysql:host=localhost;dbname=my_study","mysql","mysql");
 $sql = "SELECT * FROM file";
$statement=$pdo->prepare($sql);
$statement->execute();
$files=$statement->fetch(PDO::FETCH_ASSOC);
$img_delete=$files["image"]; 
unlink($img_delete);
$sql = "DELETE  FROM file WHERE id=:id";
 $statement=$pdo->prepare($sql);
 $statement->execute(["id"=>$id]);
 $statement->fetch(PDO::FETCH_ASSOC);
 header("Location: /task_18.php");
 ?>