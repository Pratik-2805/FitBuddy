<?php
session_start();
include '../bmi/db_connect.php'; // Include your database connection file

// Assuming you have a user_id in the session
$age = $_POST["age"];

// Prepare an SQL statement to fetch the user's profile data
$stmt = $conn->prepare("SELECT * FROM bmi_calculations_db WHERE age = ?");
$stmt->bind_param("i", $age);
$stmt->execute();

// Bind the result to variables
$stmt->bind_result($id, $user_id, $age, $sex_type, $height, $weight, $activity, $bmi, $interpretation, $normal_weight, $total_calories, $breakfast_calories, $lunch_calories, $dinner_calories, $created_at);

// Fetch the data
$stmt->fetch();

// Close the statement
$stmt->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <!-- Add your CSS and other head elements here -->
</head>
<body>
    <h1>Profile Page</h1>
    <p>User ID: <?php echo $user_id; ?></p>
    <p>Age: <?php echo $age; ?></p>
    <p>Sex Type: <?php echo $sex_type; ?></p>
    <p>Height: <?php echo $height; ?></p>
    <p>Weight: <?php echo $weight; ?></p>
    <p>Activity Level: <?php echo $activity; ?></p>
    <p>BMI: <?php echo $bmi; ?></p>
    <p>Interpretation: <?php echo $interpretation; ?></p>
    <p>Normal Weight: <?php echo $normal_weight; ?></p>
    <p>Total Calories: <?php echo $total_calories; ?></p>
    <p>Breakfast Calories: <?php echo $breakfast_calories; ?></p>
    <p>Lunch Calories: <?php echo $lunch_calories; ?></p>
    <p>Dinner Calories: <?php echo $dinner_calories; ?></p>
    <p>Created At: <?php echo $created_at; ?></p>
</body>
</html>
