<?php


$servername = "localhost";
$username = "root";
$password = "root";


$conn = new mysqli($servername, $username, $password);
$organSelect = $_POST["locationName"];
$signSelect = $_POST["location"];
$orgSelect = $_POST["State"];
$methSelect = $_POST["des"];
$city = $_POST["city"];
$address = $_POST["address"];
$id = $_POST["iD"];

$fullAddress = $address . "," . $city . "," . $orgSelect . " " . $signSelect . ", USA";

$insert = "UPDATE new_schema.location Set new_schema.location.Name='" . $organSelect . "' ,  new_schema.location.State='" . $orgSelect . "', new_schema.location.Description='" . $methSelect . "',new_schema.location.address='" . $fullAddress . "' where new_schema.location.Coordinates =" . $id;
$bool = $conn->query($insert);


header("Location: /,l,l.php");
die;
