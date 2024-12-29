<?php
session_start();
$loggedIn = isset($_SESSION['user']);

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    echo "<script>alert('You have been logged out!')</script>";
    echo "<script>window.location = '../PHP/save_calorie.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBuddy</title>
    <script src="https://kit.fontawesome.com/f812210b6b.js"></script>    
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="styles.css">
    <title>Result - BMI & CALORIES CALCULATIONS SYSTEM</title>
</head>
<body>
    <section id="header">
        <a href="#"><img src="../Image/logo1.png" class="logo" alt=""></a>
        
        <div>
            <ul id="navbar">
                <li><a href="../HTML/Home.php">Home</a></li>
                <li><a href="Workout.php">Workout</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a class="active" href="Tools.php">Tools</a></li>
                <li><a href="contact.php" >Contact</a></li>
                <?php if ($loggedIn) { ?>
                <!-- Tombol lg-profile hanya ditampilkan jika ada sesi pengguna aktif -->
                <li id="lg-profile"><a class="fas fa-user-alt " onclick="togglemenu()"></a></li>
                <?php } ?>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../Image/profil.png">
                        <h3><?php echo $_SESSION['user']?></h3>
                    </div>
                    <hr>
                    <a href="profil.php" class="sub-menu-link">
                        <img src="../Image/profil.png">
                        <p>Profil</p>
                        <span>></span>
                    </a>
                    <a href="history.php" class="sub-menu-link">
                        <img src="../Image/history.png">
                        <p>Transaction</p>
                        <span>></span>
                    </a>
                    <form id="logoutForm" action="" method="post" onsubmit="return confirmLogout()">
                        <button id="logout"type="submit" name="logout" class="sub-menu-link">
                            <img src="../Image/logout.png">
                            <p>Log Out</p>
                            <span>></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div id="mobile">
            <a href="Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <?php if ($loggedIn) { ?>
            <a onclick="togglemenu()"><i class="fas fa-user-alt"></i></a>
            <?php } ?>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>
    
    <div class="cal">
    <h2>BMI Reference Table</h2>
    <table class="tbl">
        <tr>
            <th>BMI Range</th>
            <th>Interpretation</th>
        </tr>
        <tr>
            <td>Less than 16</td>
            <td>Severe Thinness</td>
        </tr>
        <tr>
            <td>16 - 17</td>
            <td>Moderate Thinness</td>
        </tr>
        <tr>
            <td>17 - 18.6</td>
            <td>Mild Thinness</td>
        </tr>
        <tr>
            <td>18.6 - 25</td>
            <td>Normal</td>
        </tr>
        <tr>
            <td>25.1 - 30</td>
            <td>Overweight</td>
        </tr>
        <tr>
            <td>30 - 35</td>
            <td>Obese Class I</td>
        </tr>
        <tr>
            <td>35 - 40</td>
            <td>Obese Class II</td>
        </tr>
        <tr>
            <td>Over 40</td>
            <td>Obese Class III</td>
        </tr>
    </table><br>
    </div>

    <form>
        <?php

            // Assuming you have calculated $bmi, $interpretation, $normal_weight, etc.

            // Include the database connection file
            include 'db_connect.php';

            // Prepare an SQL statement
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stmt = $conn->prepare("INSERT INTO bmi_calculation_db (user_id, age, sex_type, height, weight, activity, bmi, interpretation, normal_weight, total_calories, breakfast_calories, lunch_calories, dinner_calories) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Bind parameters
            $stmt->bind_param("iissdsdssdddd", $user_id, $age, $sex_type, $height, $weight, $activity, $bmi, $interpretation, $normal_weight, $total_calories, $breakfast_calories, $lunch_calories, $dinner_calories);
            

            // Set parameters
            $age = $_POST["age"];
            $sex_type = $_POST["sex_type"];
            $height = $_POST["height"];
            $weight = $_POST["weight"];
            $activity = $_POST["activity"];
            $bmi = $weight / ($height * $height); // Your BMI calculation
            $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
            $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
            $total_calories = $bmr * $activity; // Your total calories calculation logic here

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and the connection
            $stmt->close();
            $conn->close();


            // Check if the input values are valid
            // ... existing code ...
            if (is_numeric($age) && is_numeric($height) && is_numeric($weight)) {
                $height = $height / 100; // Convert height from cm to meters
                $bmi = $weight / ($height * $height); // formula to calculate BMI

                $interpretation = ""; // Initialize interpretation variable
                if ($bmi < 16) {
                    $interpretation = "Severe Thinness";
                    $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi >= 16 && $bmi <= 17) {
                    $interpretation = "Moderate Thinness";
                    $normal_weight = ($height * height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi > 17 && $bmi < 18.6) {
                    $interpretation = "Mild Thinness";
                    $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi >= 18.6 && $bmi <= 25) {
                    $interpretation = "Normal";
                } elseif ($bmi > 25.1 && $bmi < 30) {
                    $interpretation = "Overweight";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi >= 30 && $bmi <= 35) {
                    $interpretation = "Obese Class I";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi > 35 && $bmi <= 40) {
                    $interpretation = "Obese Class II";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                } else {
                    $interpretation = "Obese Class III";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                }

                if ($interpretation != "Normal") {

                    echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>"; // show the result
                    echo "<p>($interpretation)</p>";
                    echo "<p>To achieve a Normal BMI, you need to weigh approximately " . number_format($normal_weight, 2) . " kg.</p>";
                } else {

                    echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>"; // show the result
                    echo "<p>($interpretation)</p>";
                }
                echo "</form>
                    <br><br>
                    <form>";
                $height = $height * 100; // Convert height from cm to meters
                // Calculate daily calorie needs
                if ($sex_type == "male") {
                    $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
                } elseif ($sex_type == "female") {
                    $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
                }

                $total_calories = $bmr * $activity; // formula to calculate total_calories

                // Food suggestions based on calorie needs
                $food_suggestions = "";

                // Calculate the calorie distribution for each meal
                $calories_per_meal = $total_calories / 3;

                // Define calorie ranges for each meal
                $breakfast_calories = $calories_per_meal * 0.25; // 25% of daily calories for breakfast
                $lunch_calories = $calories_per_meal * 0.35; // 35% of daily calories for lunch
                $dinner_calories = $calories_per_meal * 0.40; // 40% of daily calories for dinner

                // Food suggestions based on calorie distribution for breakfast
                if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                    // Suggestion for an overweight or obese individual
                    $breakfast_fat = "Include healthy fats like avocados or nuts.";
                    $breakfast_protien = "Opt for lean protein sources such as eggs or Greek yogurt.";
                    $breakfast_buah_sayur = "Incorporate vegetables and fruits into your breakfast for added nutrients.";
                    $breakfast_karbohodrat = "Choose whole grains for complex carbohydrates.";
                
                    $lunch_fat = "Consider a salad with olive oil dressing for healthy fats.";
                    $lunch_protien = "Select lean meats like grilled chicken or tofu for protein.";
                    $lunch_buah_sayur = "Have a side of vegetables or a fruit salad.";
                    $lunch_karbohodrat = "Include quinoa or brown rice for complex carbs.";
                
                    $dinner_fat = "Opt for baked or steamed fish for essential fats.";
                    $dinner_protien = "Choose protein sources like fish or lean beef.";
                    $dinner_buah_sayur = "Include a variety of vegetables in your dinner.";
                    $dinner_karbohodrat = "Select sweet potatoes or whole wheat pasta for carbohydrates.";
                } elseif ($interpretation == "Normal") {
                    // Suggestion for a person with a normal BMI
                    $breakfast_fat = "Balance your meal with healthy fats like nuts or seeds.";
                    $breakfast_protien = "Include a good source of protein such as eggs or Greek yogurt.";
                    $breakfast_buah_sayur = "Add vegetables or fruits for extra nutrients.";
                    $breakfast_karbohodrat = "Choose whole-grain options for carbohydrates.";
                
                    $lunch_fat = "Incorporate healthy fats like avocados or olive oil into your meal.";
                    $lunch_protien = "Opt for lean protein sources like chicken or tofu.";
                    $lunch_buah_sayur = "Include a variety of colorful vegetables and fruits.";
                    $lunch_karbohodrat = "Select whole grains for your carbohydrate source.";
                
                    $dinner_fat = "Balance your meal with sources of healthy fats like fish or nuts.";
                    $dinner_protien = "Choose protein sources like fish or lean beef for dinner.";
                    $dinner_buah_sayur = "Add a generous serving of vegetables to your dinner.";
                    $dinner_karbohodrat = "Opt for complex carbs like quinoa or brown rice.";
                } else {
                    // Suggestion for other interpretations (Severe Thinness, Moderate Thinness, Mild Thinness)
                    $breakfast_fat = "Include healthy fats for energy, such as nuts or seeds.";
                    $breakfast_protien = "Opt for protein-rich sources like eggs or Greek yogurt.";
                    $breakfast_buah_sayur = "Incorporate fruits and vegetables for added nutrients.";
                    $breakfast_karbohodrat = "Choose complex carbohydrates like oats or whole-grain bread.";
                
                    $lunch_fat = "Include sources of healthy fats like avocados or olive oil.";
                    $lunch_protien = "Select lean protein sources such as chicken or tofu.";
                    $lunch_buah_sayur = "Add a variety of colorful vegetables and fruits to your lunch.";
                    $lunch_karbohodrat = "Opt for whole grains like brown rice or quinoa.";
                
                    $dinner_fat = "Balance your meal with healthy fats from fish or nuts.";
                    $dinner_protien = "Choose protein sources like fish or lean beef for dinner.";
                    $dinner_buah_sayur = "Include a generous serving of vegetables for dinner.";
                    $dinner_karbohodrat = "Select complex carbohydrates like sweet potatoes or whole wheat pasta.";
                }                

                echo "<p>Your Daily Calorie Needs: " . number_format($total_calories, 2) . " calories per day</p>"; // show the result
                echo "<p>Calories for Breakfast: " . number_format($breakfast_calories, 2) . " calories</p>";
                echo "<p>Calories for Lunch: " . number_format($lunch_calories, 2) . " calories</p>";
                echo "<p>Calories for Dinner: " . number_format($dinner_calories, 2) . " calories</p>";
            } else {
                echo "<p>Invalid input. Please enter numeric values for age, height, and weight.</p>";
            }
        } else {
            echo "<p>Form data not submitted.</p>";
        }
        ?>
    </form>
    <br>
    <script>
        // JavaScript code to highlight the user's BMI range
        document.addEventListener("DOMContentLoaded", function () {
            var interpretation = "<?php echo $interpretation; ?>";
            var table = document.querySelector("table");
            var rows = table.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the table header row
                var cells = rows[i].getElementsByTagName("td");
                if (cells.length >= 2) {
                    if (cells[1].textContent.trim().toLowerCase() === interpretation.toLowerCase()) {
                        rows[i].classList.add("highlight"); // Add a CSS class to highlight the row
                        // If you have specific styles for the cells, you can highlight them individually too.
                        // cells[0].classList.add("highlight");
                        // cells[1].classList.add("highlight");
                        break; // Stop after finding the match
                    }
                }
            }
        });

        // Add an access key for the Print button (Alt + Shift + P)
        printButton.accessKey = "p";
    </script>
    <a href="foodsuggest.php?breakfast_fat=<?php echo urlencode($breakfast_fat); ?>&breakfast_protien=<?php echo urlencode($breakfast_protien); ?>&breakfast_buah_sayur=<?php echo urlencode($breakfast_buah_sayur); ?>&breakfast_karbohodrat=<?php echo urlencode($breakfast_karbohodrat); ?>
    &lunch_fat=<?php echo urlencode($lunch_fat); ?>&lunch_protien=<?php echo urlencode($lunch_protien); ?>&lunch_buah_sayur=<?php echo urlencode($lunch_buah_sayur); ?>&lunch_karbohodrat=<?php echo urlencode($lunch_karbohodrat); ?>
    &dinner_fat=<?php echo urlencode($dinner_fat); ?>&dinner_protien=<?php echo urlencode($dinner_protien); ?>&dinner_buah_sayur=<?php echo urlencode($dinner_buah_sayur); ?>&dinner_karbohodrat=<?php echo urlencode($dinner_karbohodrat); ?>
    &interpretation=<?php echo urlencode($interpretation); ?>&name=<?php echo urlencode($name); ?>" class="button" name="submit" target="_Blank">Show Food Suggestions</a>
    <!-- Add Print button -->
    <center>
        <br><br>
        <button id="printButton" class="button" style="display: none;">Save PDF</button>
    </center>
    <script>
        var showFoodSuggestionsButton = document.getElementById("showFoodSuggestions");
        
    </script>

<section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>spesial Offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="../Image/logo1.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> Alfa Tower, Jalan Jalur Sutera Barat Kav. 7-9 Alam Sutera, Tangerang</p>
            <p><strong>Phone:</strong> 021 80821428/ +6285311135852</p>
            <p><strong>Hours:</strong> 20:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="about.php">About us</a> 
            <a href="">Privacy Policy</a> 
            <a href="">Terms & Conditions</a> 
            <a href="contact.php">Contact us</a>         
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="Login.php">Sign in</a> 
            <a href="Cart.php">View Cart</a> 
            <a href="contact.php">Help</a>         
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>Form App Store or Google Play Store</p>
            <div class="row">
                <img src="../Image/pay/app.jpg" alt="">
                <img src="../Image/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="../Image/pay/pay.png" alt="">
        </div>

        <div class="copyright">
        </div>
    </footer>

    <script>
        let subMenu = document.getElementById("subMenu");

        function togglemenu(){
            subMenu.classList.toggle("open-wrap");
            var profileLink = document.querySelector("#lg-profile a");
            profileLink.classList.toggle("active");
        }
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
    <script src="../JavaScript/script.js"></script>
    <script src="../JavaScript/main.js"></script>

</body>
</html>
