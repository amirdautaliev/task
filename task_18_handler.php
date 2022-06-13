<?php 
    
$image = pathinfo($_FILES['image']['name']);
$filename = uniqid() . ".".$image['extension'];

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$filename);

$pdo = new PDO("mysql:host=localhost;dbname=my_study","mysql","mysql");
$sql = "INSERT INTO file (image) VALUES (:image)";
$statement=$pdo->prepare($sql);
$statement->execute(["image"=>"uploads/" .$filename]);

header("Location: /task_18.php");

 ?>