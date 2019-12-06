
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="update2.php" method="post">
    <p>Activity Name:</p> <input required type="text" name ="ActivityName">
    <br />
    <input type="hidden" name ="location" value="<?php $id =$_GET['id'];
    echo $id?>">
    <input type="hidden" name ="id" value="<?php $id =$_GET['id2'];
    echo $id?>">
    <br />
    <p>Price:</p> <input required type="number" step=".01" min='0.00' max="1000.00" name ="price">
    <br />
    <p>Phone Number:</p> <input required type="tel" name ="phone" pattern="[0-9]{10}">
    <br />
    <p>Type:</p> <select name ="type">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $conn = new mysqli($servername, $username, $password);
        $sql ="select * from new_schema.theme";
        $result = $conn->query($sql);
        while ($types = $result->fetch_object()) {
            echo "<option value='".$types->TypeID."'>".$types->Type."</option>";
        }
        ?>
    </select>
    <br />
    <p>Description:</p> <input type="text" name ="des">
    <br />
    <input type="submit" value="Insert">
</form>
</body>
</html>
