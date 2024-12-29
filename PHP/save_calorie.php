<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "calorie_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$activity_level = $_POST['activity_level'];

// Calculate daily calories based on Mifflin-St Jeor equation
// For simplicity, we'll use a basic formula for men and women
// Men: BMR = 10 * weight(kg) + 6.25 * height(cm) - 5 * age(y) + 5
// Women: BMR = 10 * weight(kg) + 6.25 * height(cm) - 5 * age(y) - 161
// Note: This is a simplified version. Real-world calculations might be more complex.

$bmr = 0;
if ($activity_level == 'sedentary') {
    $bmr = 1.2;
} elseif ($activity_level == 'lightly_active') {
    $bmr = 1.375;
} elseif ($activity_level == 'moderately_active') {
    $bmr = 1.55;
} elseif ($activity_level == 'very_active') {
    $bmr = 1.725;
} elseif ($activity_level == 'extra_active') {
    $bmr = 1.9;
}

$daily_calories = 0;
if ($age >= 18 && $age <= 30) {
    $daily_calories = $bmr * 1500;
} elseif ($age > 30 && $age <= 50) {
    $daily_calories = $bmr * 1200;
} elseif ($age > 50) {
    $daily_calories = $bmr * 1000;
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO calorie_calculations (age, weight, height, activity_level, daily_calories) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iddss", $age, $height, $weight, $activity_level, $daily_calories);

// Execute the statement
if ($stmt->execute()) {
    echo "Calorie calculation saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
