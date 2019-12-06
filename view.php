<?php

$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);
$id = $_GET['id'];
if(isset($_POST["price"])) {
    $sqlExtra = $_POST["price"];
}
if(isset($_POST["type"])) {
    $sqlExtra2 = $_POST["type"];
}
//echo $id;
$sql = "select * from new_schema.location where new_schema.location.Coordinates=".$id;
$sql1 = "select * from new_schema.activities left join new_schema.theme on  new_schema.activities.TypeID=new_schema.theme.TypeID  where new_schema.activities.Coordinates=".$id;
$results =$conn->query($sql);

echo "<!DOCTYPE html>
<html lang='en'>
<head>

    <meta charset='UTF-8'>
    <title>Title</title>
      <link rel='stylesheet' type='text/css' href='styles.css'>
<script  src=\"https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js\"></script>
</head>

<body style='background-color: darkcyan' >
";
if ($conn->connect_error) {
    echo "<h1>Connection failed: ".$conn->connect_error."</h1>";
}
if (!empty($conn)) {
 //   $result = $conn->query($sql);
    $location =$results->fetch_object();
  echo"<h1>".$location->Name."</h1>";
  echo"<p style='padding-right: 10px'>Description: ".$location->Description."</p>";
    echo"<p style='padding-right: 10px'>Address: ".$location->address."</p>";
    if(!empty($sqlExtra)){
        $sql1 .=" And new_schema.activities.Price <=".$sqlExtra;
    }
    if(!empty($sqlExtra2)){
        echo "<h2>$sqlExtra2</h2>";
        $sql1 .=" And new_schema.theme.Type ='".$sqlExtra2."'";

    }
    $results2 =$conn->query($sql1);
    echo "<form action='view.php?id=".$id."' method='post'>
  <p>Price(1-1000):</p> <input  type=\"number\" min='0.00' max=\"1000.00\" step='.01' name =\"price\">
      <p>Type:</p> <select name =\"type\">
        ";
        $sql3 ="select * from new_schema.theme";
        $result3 = $conn->query($sql3);
            echo "<option value=''>Nothing</option>";
        while ($types = $result3->fetch_object()) {

            echo "<option value='".$types->Type."'>".$types->Type."</option>";
        }
        echo"
       
    <input type='submit' value='end'>
    </form><table>
       <tr>
     <th>Name</th>
     <th>Phone Number</th>
     <th>Price</th>
     <th>Type</th>
     <th>View</th>
     <th>Delete</th>
     <th>Update</th>
     </tr>";
    if($results2 != false) {
        while ($active = $results2->fetch_object()) {
            echo "<tr>
    <td>" . $active->Name . "</td>
    <td>" . $active->PhoneNumber . "</td>
    <td>" . $active->Price . "</td>
    <td>" . $active->Type. "</td>
     <td><a href='view2.php?id=" . $active->ActivityID . "'>view</a></td>
    <td><a href='delete2.php?id=" . $active->ActivityID . "&id2=".$id."'>delete</a></td>
        <td><a href='updateForm2.php?id2=" . $active->ActivityID . "&id=".$id."'>update</a></td>
  </tr>";
        }

    }
    echo "</table>";
    echo"<button id='Backtofirst' name='backTofirst'><a href=',l,l.php'>Back to first</a></button>";
    echo"<button id='insert' name='insert'><a href='formActivity.php?id=".$id."'>insert</a></button>";

}
echo "</body></html>";
