<?php 
session_start();
$email = $_POST['email'];
$password = $_POST["password"];

$pdo = new PDO ("mysql:host=localhost;dbname=my_table","mysql","mysql");
$sql = "SELECT *  FROM users WHERE email=:email";
$statement=$pdo->prepare($sql);
$statement->execute(["email"=>$email]);
$users=$statement->fetch(PDO::FETCH_ASSOC);



if(!empty($users)){
$_SESSION['danger'] = 'в базе существует логин';
header("Location: /task_13.php");
exit;
}




$sql = "INSERT INTO users (email,password) VALUES (:email,:password)";
$statement=$pdo->prepare($sql);
$statement->execute([
	"email"=>$email,
	"password"=>password_hash($password, PASSWORD_DEFAULT)
]);
$_SESSION["success"] = "Вы успешно прошли регистрацию";
header("Location: /task_13.php");

 ?>