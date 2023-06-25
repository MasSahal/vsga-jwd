<?php
$servername = "localhost"; // Replace with your MySQL server name
$username = "roots"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password

// Create a connection
$conn = mysqli_connect($servername, $username, $password);

// Check the connection
if (!$conn) {
    echo "error";
} else {
    echo "success";
}

// Close the connection
$conn->close();
