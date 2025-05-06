<?php
// Assuming you have a MySQL database setup
$servername = "localhost";
$username = "username"; // Replace with your MySQL username
$password = "password"; // Replace with your MySQL password
$dbname = "feedback"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the feedback from the POST request
$feedback = $_POST["feedback"];

// Prepare SQL statement to insert feedback into the database
$sql = "INSERT INTO feedback_table (feedback_text) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $feedback);

// Execute the prepared statement
if ($stmt->execute() === TRUE) {
    echo "Feedback stored successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
