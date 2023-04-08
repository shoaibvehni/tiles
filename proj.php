<?php
$servername = "localhost"; // Change this to your server name
$username = "username"; // Change this to your database username
$password = "password"; // Change this to your database password
$dbname = "database_name"; // Change this to your database name

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert form data into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO form_data (fullname, email, message) VALUES ('$fullname', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Form data added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
