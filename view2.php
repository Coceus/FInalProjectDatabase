<?php


$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
$id = $_GET['id'];
$sql = "select * from new_schema.activities Left JOIN new_schema.theme on new_schema.activities.TypeID=new_schema.theme.TypeID where new_schema.activities.ActivityID=" . $id;
$results = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='en'>
<head>

    <meta charset='UTF-8'>
    <title>Title</title>
     <link rel='stylesheet' type='text/css' href='styles.css'>
<script  src=\"https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js\"></script>
</head>

<body>
";
if ($conn->connect_error) {
    echo "<h1>Connection failed: " . $conn->connect_error . "</h1>";
}
if (!empty($conn)) {
    //   $result = $conn->query($sql);
    $location = $results->fetch_object();
    echo "<h1>Name of event:" . $location->Name . "</h1>";
    echo "<p>Price :" . $location->Price . "</p>";
    echo "<p>Phone Number:" . $location->PhoneNumber . "</p>";
    echo "<p>Type: " . $location->Type . "</p>";
    echo "<p>Description:" . $location->Description . "</p>";


}
echo "
<form action=\"insert3.php\" method=\"post\"><p>give a description and rate</p> <textarea name='comment'></textarea>
 
    <select name=\"Raiting\">
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
     <option value=4>4</option>
    <option value=5>5</option>
    
</select>
<input type=\"hidden\" name =\"Active\" value=".$id.">
<input type=\"submit\" value=\"Insert\"></form>";
$sql2 = "select * from new_schema.comment where new_schema.comment.ActivityID =".$id;
$sql3 = "select AVG (new_schema.comment.Rating) as average from new_schema.comment where new_schema.comment.ActivityID =".$id;
$results2 = $conn->query($sql2);
$results3 = $conn->query($sql3);
$new =$results3->fetch_object();
echo "<table>
<tr>
     <td>Average Rating is </td>
    <td>" . $new->average . "</td>
 </tr>
<tr>
     <th>Comment</th>
    <th>Rating</th>
 </tr>";
if($results2 != false) {
    while ($comments = $results2->fetch_object()){
        echo "<tr>
     <td>" . $comments->Comment. "</td>
    <td>" . $comments->Rating . "</td>
        </tr>";
    }

}
echo "</table>";
echo"<button id='Backtofirst' name='backTofirst'><a href=',l,l.php'>Back to first</a></button>";
while ($comments = $results->fetch_object())
echo "</body></html>";
