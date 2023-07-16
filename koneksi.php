<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    echo "error";
} else {
    echo "success";
}

$conn->close();
