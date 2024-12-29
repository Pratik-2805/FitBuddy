<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bmi_values";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get height and weight from form
    $height = $_POST["height"];
    $weight = $_POST["weight"];

    // Calculate BMI
    $bmi = $weight / ($height * $height);

    // Prepare an insert statement
    $stmt = $conn->prepare("INSERT INTO bmi_values (height, weight, bmi) VALUES (?, ?, ?)");
    $stmt->bind_param("ddd", $height, $weight, $bmi);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

?>
