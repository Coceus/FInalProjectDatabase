<?php
$servername = "localhost";
$username = "root";
$password = "root";


$conn = new mysqli($servername, $username, $password);
$organSelect = $_POST["ActivityName"];
$signSelect = (int)$_POST["location"];
$orgSelect = (float)$_POST["price"];
$phone = $_POST["phone"];
$type = (int)$_POST["type"];
$des = $_POST["des"];
$insert = "INSERT INTO new_schema.activities(`Name`, `Coordinates`,`Price` ,`TypeID` ,`PhoneNumber` ,`Description`) 
            VALUES ('" . $organSelect . " ', '" . $signSelect . "' ,' " . $orgSelect . "' ,'" . $type." ',' " . $phone . " ','" . $des . " '  ) ";

$bool = $conn->query($insert);


header("Location: view.php?id=".$signSelect);
die;
