<?php

$servername = "localhost";
$username = "root";
$password = "root";


$conn = new mysqli($servername, $username, $password);
$organSelect = (int)$_POST["Raiting"];
$signSelect = $_POST["comment"];
$orgSelect = (int)$_POST["Active"];
$insert = "INSERT INTO new_schema.comment(`Rating`, `Comment`,`ActivityID` ) 
            VALUES ('" . $organSelect . " ', '" . $signSelect . "' ,' " . $orgSelect . "'  ) ";
$bool = $conn->query($insert);
header("Location: view2.php?id=".$orgSelect);
die;
