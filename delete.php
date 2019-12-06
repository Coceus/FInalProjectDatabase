<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
$id = $_GET['id'];

$sql3 = " select * from new_schema.activities where new_schema.activities.Coordinates =".$id;
$results =$conn->query($sql3);
if($results!=false){
while($end = $results->fetch_object()) {
   echo $id;
    $sql4 = "Delete from new_schema.comment where new_schema.comment.ActivityID=".$end->ActivityID;
    $conn->query($sql4);
}
}
$sql = "Delete from new_schema.activities where new_schema.activities.Coordinates=".$id;
$sql2 = "Delete from new_schema.location where new_schema.location.Coordinates=".$id;
$conn->query($sql);
$conn->query($sql2);
header("Location: /,l,l.php");
die;
