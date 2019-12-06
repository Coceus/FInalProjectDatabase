
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$conn = new mysqli($servername, $username, $password);
if(isset($_POST["State2"])) {
    $sqlextra = $_POST["State2"];
}
if((isset($_POST["State3"]))||(isset($_POST["address3"]))||(isset($_POST["city3"]))||(isset($_POST["location3"]))) {

    $fullAddress2 = $_POST["address3"].",".$_POST["city3"].",".$_POST["State3"]." ".$_POST["location3"] .", USA";
}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <link rel='stylesheet' type='text/css' href='styles.css'>
    <meta charset='UTF-8'>
    <title>Title</title>
</head>
<body>
<h1>Locations</h1>
<form action=',l,l.php' method='post'>

State: <select name=\"State2\">
    <option value=''>Nothing</option>
    <option value=\"AL\">Alabama</option>
    <option value=\"AK\">Alaska</option>
    <option value=\"AZ\">Arizona</option>
    <option value=\"AR\">Arkansas</option>
    <option value=\"CA\">California</option>
    <option value=\"CO\">Colorado</option>
    <option value=\"CT\">Connecticut</option>
    <option value=\"DE\">Delaware</option>
    <option value=\"DC\">District Of Columbia</option>
    <option value=\"FL\">Florida</option>
    <option value=\"GA\">Georgia</option>
    <option value=\"HI\">Hawaii</option>
    <option value=\"ID\">Idaho</option>
    <option value=\"IL\">Illinois</option>
    <option value=\"IN\">Indiana</option>
    <option value=\"IA\">Iowa</option>
    <option value=\"KS\">Kansas</option>
    <option value=\"KY\">Kentucky</option>
    <option value=\"LA\">Louisiana</option>
    <option value=\"ME\">Maine</option>
    <option value=\"MD\">Maryland</option>
    <option value=\"MA\">Massachusetts</option>
    <option value=\"MI\">Michigan</option>
    <option value=\"MN\">Minnesota</option>
    <option value=\"MS\">Mississippi</option>
    <option value=\"MO\">Missouri</option>
    <option value=\"MT\">Montana</option>
    <option value=\"NE\">Nebraska</option>
    <option value=\"NV\">Nevada</option>
    <option value=\"NH\">New Hampshire</option>
    <option value=\"NJ\">New Jersey</option>
    <option value=\"NM\">New Mexico</option>
    <option value=\"NY\">New York</option>
    <option value=\"NC\">North Carolina</option>
    <option value=\"ND\">North Dakota</option>
    <option value=\"OH\">Ohio</option>
    <option value=\"OK\">Oklahoma</option>
    <option value=\"OR\">Oregon</option>
    <option value=\"PA\">Pennsylvania</option>
    <option value=\"RI\">Rhode Island</option>
    <option value=\"SC\">South Carolina</option>
    <option value=\"SD\">South Dakota</option>
    <option value=\"TN\">Tennessee</option>
    <option value=\"TX\">Texas</option>
    <option value=\"UT\">Utah</option>
    <option value=\"VT\">Vermont</option>
    <option value=\"VA\">Virginia</option>
    <option value=\"WA\">Washington</option>
    <option value=\"WV\">West Virginia</option>
    <option value=\"WI\">Wisconsin</option>
    <option value=\"WY\">Wyoming</option>
</select>
  
    <input type='submit' value='end'>
    </form>
    <form action=\",l,l.php\" method=\"post\">

 Address : <input type=\"text\" id=\"adr\" name=\"address3\">
  City :<input type=\"text\"name=\"city3\" >
 
    ZipCode : <input type=\"number\" name =\"location3\">
  
    State : <select name=\"State3\">
    <option value=\"AL\">Alabama</option>
    <option value=\"AK\">Alaska</option>
    <option value=\"AZ\">Arizona</option>
    <option value=\"AR\">Arkansas</option>
    <option value=\"CA\">California</option>
    <option value=\"CO\">Colorado</option>
    <option value=\"CT\">Connecticut</option>
    <option value=\"DE\">Delaware</option>
    <option value=\"DC\">District Of Columbia</option>
    <option value=\"FL\">Florida</option>
    <option value=\"GA\">Georgia</option>
    <option value=\"HI\">Hawaii</option>
    <option value=\"ID\">Idaho</option>
    <option value=\"IL\">Illinois</option>
    <option value=\"IN\">Indiana</option>
    <option value=\"IA\">Iowa</option>
    <option value=\"KS\">Kansas</option>
    <option value=\"KY\">Kentucky</option>
    <option value=\"LA\">Louisiana</option>
    <option value=\"ME\">Maine</option>
    <option value=\"MD\">Maryland</option>
    <option value=\"MA\">Massachusetts</option>
    <option value=\"MI\">Michigan</option>
    <option value=\"MN\">Minnesota</option>
    <option value=\"MS\">Mississippi</option>
    <option value=\"MO\">Missouri</option>
    <option value=\"MT\">Montana</option>
    <option value=\"NE\">Nebraska</option>
    <option value=\"NV\">Nevada</option>
    <option value=\"NH\">New Hampshire</option>
    <option value=\"NJ\">New Jersey</option>
    <option value=\"NM\">New Mexico</option>
    <option value=\"NY\">New York</option>
    <option value=\"NC\">North Carolina</option>
    <option value=\"ND\">North Dakota</option>
    <option value=\"OH\">Ohio</option>
    <option value=\"OK\">Oklahoma</option>
    <option value=\"OR\">Oregon</option>
    <option value=\"PA\">Pennsylvania</option>
    <option value=\"RI\">Rhode Island</option>
    <option value=\"SC\">South Carolina</option>
    <option value=\"SD\">South Dakota</option>
    <option value=\"TN\">Tennessee</option>
    <option value=\"TX\">Texas</option>
    <option value=\"UT\">Utah</option>
    <option value=\"VT\">Vermont</option>
    <option value=\"VA\">Virginia</option>
    <option value=\"WA\">Washington</option>
    <option value=\"WV\">West Virginia</option>
    <option value=\"WI\">Wisconsin</option>
    <option value=\"WY\">Wyoming</option>
</select>
    <input type=\"submit\" value=\"Get Distance\">
</form>
";
if ($conn->connect_error) {
  echo "<h1>Connection failed: ".$conn->connect_error."</h1>";
}
$sql ="select * from new_schema.location";
if(!empty($sqlextra)){
    $sql ="select * from new_schema.location where new_schema.location.State=' ".$sqlextra."'";
}
if (!empty($conn)) {
    $result = $conn->query($sql);
    echo "<table>
     <tr>
     <th>Name</th>
     <th>State</th>
      "; if(!empty($fullAddress2)) {
     echo "<th>Distance Away</th>";
        }
        echo "
     <th>View</th>
     <th>Delete</th>
     <th>Update</th>
     </tr>";

    if($result != false) {

        while ($abstract = $result->fetch_object()) {
            echo "<tr>
    
     <td>" . $abstract->Name . "</td>
    <td>" . $abstract->State . "</td>
    ";
    if(!empty($fullAddress2)) {
      echo"  <td > " .getDistance($abstract->address,$fullAddress2,''). "</td >";
        }
   echo " <td><a href='view.php?id=" . $abstract->Coordinates . "'>view</a></td>
    <td><a href='delete.php?id=" . $abstract->Coordinates . "'>delete</a></td>
      <td><a href='updateForm.php?id=" . $abstract->Coordinates . "'>update</a></td>
</tr>";
        }

    }
else{
    echo $sqlextra;
}
    echo "</table>";

    echo"<button id='insert' name='insert'><a href='k.html'>insert</a></button>";

}
echo"<button id='Backtofirst' name='backTofirst'><a href=',l,l.php'>Reset</a></button>";
echo "</body></html>";


function getDistance($addressFrom, $addressTo, $unit = '')
{
    // Google API key
    $apiKey = 'AIzaSyDI1pQq9G7NXOxzR-RLGHNYBZZO_ZQHcSI';

    // Change address format
    $formattedAddrFrom = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo = str_replace(' ', '+', $addressTo);

    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=AIzaSyDI1pQq9G7NXOxzR-RLGHNYBZZO_ZQHcSI');
    $outputFrom = json_decode($geocodeFrom);
    if (!empty($outputFrom->error_message)) {
        return $outputFrom->error_message;
    }

    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=AIzaSyDI1pQq9G7NXOxzR-RLGHNYBZZO_ZQHcSI');
    $outputTo = json_decode($geocodeTo);
    if (!empty($outputTo->error_message)) {
        return $outputTo->error_message;
    }

    // Get latitude and longitude from the geodata
    $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo = $outputTo->results[0]->geometry->location->lng;

    // Calculate distance between latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;

    // Convert unit and return distance
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return round($miles * 1.609344, 2) . ' km';
    } elseif ($unit == "M") {
        return round($miles * 1609.344, 2) . ' meters';
    } else {
        return round($miles, 2) . ' miles';
    }
}


