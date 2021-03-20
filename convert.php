<?php
/*
 * @date: 3/20/21, 9:26 AM
 * @author : Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * Copyright (c) 2021.
 */

$servername = "localhost";
$username = "dbuser";
$password = "dbpass";
$dbname = "dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $conn->query("call UnHexUsrPasswd ( '" . $row['name'] . "',@uid,@passwd ) ");
        echo $row['name'] . " OK<br />";
    }
} else {
    echo "0 results";
}
$conn->close();
