<?php 


for ($i=0 ; $i < count($_FILES['image']['name'])  ; $i++ ) { 
upload_file($_FILES['image']['name'][$i],$_FILES['image']['tmp_name'][$i]);

}

function upload_file($filename,$tmpname) {

$result = pathinfo($filename);
$filename = uniqid() . "." .$result['extension'];
move_uploaded_file($tmpname,  "uploads/" . $filename);
$pdo = new PDO("mysql:host=localhost;dbname=my_table","mysql","mysql");
$sql = "INSERT INTO file (image) VALUES (:image)";
$statement=$pdo->prepare($sql);
$statement->execute(["image"=> "uploads/". $filename]);

}
header("Location: /task_20.php");

 ?>  
 