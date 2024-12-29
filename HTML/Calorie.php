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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternakk Otot Website</title>
    <script src="https://kit.fontawesome.com/f812210b6b.js"></script>    
    <link rel="stylesheet" href="../CSS/calorie.css">
    <link rel="stylesheet" href="../CSS/style.css">

</head>

<body>
    <section id="header">
        <a href="#"><img src="../Image/logo1.png" class="logo" alt=""></a>
        
        <div>
            <ul id="navbar">
                <li><a href="Home.php">Home</a></li>
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

    <!--Caloric Needs Calculator-->
    <section id="caloric-needs" class="page page-dark">
      <h1>CALORIC NEEDS</h1><br />
      <p
        >The Calorie Calculator can be used to estimate the number of calories a person needs to consume each day. This
        calculator can also provide some simple guidelines for gaining or losing weight.</p
      >
      <br /><hr /><br />
      <h1>Calorie Needing Calculator</h1>
      <div class="container">
        <form id="calorie-form">
          Gender: <br />
          <input type="radio" id="male" name="gender" value="male" />
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender" value="female" />
          <label for="female">Female</label><br />
          <label for="age">Age:</label><br />
          <input type="text" id="age" placeholder="15-80 years" /><br />
          <label for="calorie-height">Height:</label><br />
          <input type="text" id="calorie-height" placeholder="Centimeters" /><br />
          <label for="calorie-weight">Weight:</label><br />
          <input type="text" id="calorie-weight" placeholder="Kilograms" /><br />
          <label for="activity">Activity:</label><br />
          <select name="activity" id="activity">
            <option value="basal">Basal Metabolic Rate (BMR)</option>
            <option value="sedentary">Sedentary: little or no exercise</option>
            <option value="light">Light: exercise 1-3 times/week</option>
            <option value="moderate">Moderate: exercise 4-5 times/week</option>
            <option value="active">Active: daily exercise or intense exercise 3-4 times/week</option>
            <option value="very-active">Very Active: intense exercise 6-7 times/week</option>
            <option value="extra-active">Extra Active: very intense exercise daily or physical job</option> </select
          ><br /><br />
          <span id="calorie-submit" class="btn btn-blue">Submit</span>
        </form>
        <div class="list-box">
          <br /><h5 id="calorie-result">YOUR CALORIE NEEDING = [Not Entered]</h5><br />
          <h3>Guideline:</h3>
          <ul>
            <li>To Lose Weight: Take 250-500 minus your calorie needing.</li>
            <li>To Maintain: Take 0-200 minus or 0-200 plus your calorie needing.</li>
            <li>To Gain Weight: Take 250-500 plus your calorie needing.</li>
          </ul>
          <a href="../PHP/foodsuggest.php"><button class="button">Food Suggestion</button></a>
        </div>
      </div>
    </section>

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
            <p><strong>Address:</strong> 301, Galaxy Complex, Opp. Sarabhai Gate 390007, Opp. Sarabhai Gate</p>
            <p><strong>Phone:</strong> +91 2256375425</p>
            <p><strong>City/State:</strong> Mumbai / Maharashtra</p>
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
    <script src="../JavaScript/calorie.js"></script>

</body>
</html>