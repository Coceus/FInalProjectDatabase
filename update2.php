<?php

$servername = "localhost";
$username = "root";
$password = "root";


$conn = new mysqli($servername, $username, $password);
$organSelect = $_POST["ActivityName"];
$signSelect = (int)$_POST["location"];
$id= (int)$_POST["id"];
$orgSelect = (float)$_POST["price"];
$phone = $_POST["phone"];
$type = (int)$_POST["type"];
$des = $_POST["des"];
$insert = "UPDATE new_schema.activities Set new_schema.activities.Name='".$organSelect."' ,  new_schema.activities.Price ='". $orgSelect . "', new_schema.activities.TypeID= '".  $type ."',new_schema.activities.Description ='".$des."',new_schema.activities.PhoneNumber ='".$phone."' where new_schema.activities.ActivityID =".$id;
$bool = $conn->query($insert);


header("Location: view.php?id=" . $signSelect);
die;
