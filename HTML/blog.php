<?php
session_start();
$loggedIn = isset($_SESSION['user']);

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    echo "<script>alert('You have been logged out!')</script>";
    echo "<script>window.location = 'home.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBuddy</title>
    <script src="https://kit.fontawesome.com/f812210b6b.js"></script>    
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="../Image/logo1.png" class="logo" alt=""></a>
        
        <div>
            <ul id="navbar">
                <li><a href="Home.php">Home</a></li>
                <li><a href="Workout.php">Workout</a></li>
                <li><a class="active" href="blog.php">Blog</a></li>
                <li><a href="Tools.php">Tools</a></li>
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
                        <p>Profile</p>
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

    <section class="">
        <div class="text-container">
            <h2>READ MORE</h2>
            <p>Read all about healty life</p>
        </div>
        <div class="blog-header"></div>
    </section>

    <section id="blog">
        <div class="blog-box">
            <div class="blog-img">
                <img src="../Image/blog/b1.jpg">
            </div>
            <div class="blog-details">
                <h4>Healthy food</h4>
                <p style="text-align: justify;">Healthy food is needed by the body to maintain organ function and ensure its performance. 
                In general, the types of food that fall into the healthy food group contain various nutrients. The requirements for healthy 
                food (4 healthy 5 perfect), namely clean, have good and balanced nutrition. A healthy food balance is food that contains 
                carbohydrates, protein, fat and vitamins....</p>
                <a href="https://www.halodoc.com/kesehatan/makanan-sehat">Continue reading</a>
            </div>
            <h1>01/01</h1>
        </div>

        <div class="blog-box">
            <div class="blog-img">
                <img src="../Image/blog/b3.jpg">
            </div>
            <div class="blog-details">
                <h4>Benefits of Stretching</h4>
                <p style="text-align: justify;">As per research, there are various benefits of stretching, specifically dynamic stretching. 
                Performing dynamic stretching before a workout can improve performance and prevent muscle imbalances. In simple terms, muscle 
                stretching can help in injury prevention as it:  ...</p>
                <a href="https://www.anytimefitness.co.in/the-benefits-of-stretching/">Continue reading</a>
            </div>
            <h1>01/03</h1>
        </div>

        <div class="blog-box">
            <div class="blog-img">
                <img src="../Image/blog/b5.jpg">
            </div>
            <div class="blog-details">
                <h4>How to Calculate & Control Portion Sizes</h4>
                <p style="text-align: justify;">Portion control is essential to maintaining a healthy lifestyle, and it’s high time we take the mystery 
                out of knowing how much to eat. In this guide, we’re digging into the science of portion control and giving you five easy ways to manage
                 your food intake. Time to discover the secrets to a balanced and healthy diet!...</p>
                <a href="https://blog.myfitnesspal.com/essential-guide-portion-sizes/">Continue reading</a>
            </div>
            <h1>01/02</h1>
        </div>

        <div class="blog-box">
            <div class="blog-img">
                <img src="../Image/blog/b4.jpg">
            </div>
            <div class="blog-details">
                <h4>Top 10 Muscle-Building Exercises For Beginners</h4>
                <p style="text-align: justify;">Building muscles takes time, resilience, persistence, and even a long-term commitment. 
                The process of gaining muscles can be said to as a physiological process called hypertrophy, which stresses the tissue, 
                breaks it down, and provokes the body to rebuild bigger and stronger tissue. ...</p>
                <a href="https://www.anytimefitness.co.in/muscle-building-exercises-for-beginners/">Continue reading</a>
            </div>
            <h1>01/04</h1>
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
</body>
</html>