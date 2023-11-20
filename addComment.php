<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "comment_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = isset($_POST['username']) ? mysqli_real_escape_string(htmlspecialchar($_POST["username"])) : '';
$content = isset($_POST["comment"]) ? $_POST["comment"] : '';

if(!$username || !$content) die('test');


    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // SQL query to insert data into a table
    $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


// Close the connection
$conn->close();
?>