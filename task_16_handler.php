<?php 
$email = $_POST["email"];
$password  = $_POST["password"];


$pdo = new PDO ("mysql:host=localhost;dbname=my_table","mysql","mysql");
$sql = "INSERT INTO users (email,password) VALUES (:email,:password)";
$statement=$pdo->prepare($sql);
$statement->execute([
	"email"=>$email,
	"password"=>password_hash($password,PASSWORD_DEFAULT)
]);






 ?>