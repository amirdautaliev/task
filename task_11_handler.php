<?php 
session_start();
$text = $_POST["text"]; 



$pdo = new PDO("mysql:host=localhost;dbname=person","mysql","mysql");
$sql = "SELECT * FROM text where text=:text";
$statement=$pdo->prepare($sql);
$statement->execute(["text"=>$text]);
$tassk=$statement->fetch (PDO::FETCH_ASSOC);

if (!empty($tassk)) {
   $_SESSION['danger']="Запись уже существует в таблице";
   header("Location: /save11.php");
   exit;
}





$sql = "INSERT INTO text (text) VALUES (:text)";
$statement =$pdo->prepare($sql);
$statement->execute(["text"=>$text]);

$_SESSION["success"]="Запись успешно добавлен в базе";


 header("Location: /task_12.php");
 ?>