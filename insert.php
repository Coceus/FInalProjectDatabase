

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




$fullAddress = $address.",".$city.",".$orgSelect." ".$signSelect .", USA";
  $insert = "INSERT INTO new_schema.location(`Name`,`State` ,`Description`,`address`) 
            VALUES ('" . $organSelect . " ',' " . $orgSelect . "' , '" . $methSelect . " ', '" . $fullAddress. " ') ";
  $bool = $conn->query( $insert );




header("Location: /,l,l.php");
die;
