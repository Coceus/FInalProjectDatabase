<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
$id = $_GET['id'];
$id2 = $_GET['id2'];
$sql = "Delete from new_schema.comment where new_schema.comment.ActivityID=".$id;
$sql1 = "Delete from new_schema.activities where new_schema.activities.ActivityID=".$id;
$conn->query($sql);
$conn->query($sql1);
header("Location: view.php?id=".$id2);
die;
