<?php

$servername = "localhost";
$username = "root";
$password = "root";
$conn = new mysqli($servername, $username, $password);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <link rel='stylesheet' type='text/css' href='styles.css'>;

    <meta charset='UTF-8'>
    <title>Insert location</title>
<script  src=\"https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js\"></script>
</head>

<body>
<for
<h1>Locations</h1>";

echo "</body></html>";
?>

<script>

    jQuery(document).ready(function () {

        jQuery('#insert').on('click', function () {
            jQuery('#result').load('http://localhost:63342//FinalProject/k.html');

        });

    });

</script>
