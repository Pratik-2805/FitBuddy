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
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="style2.css">

</head>

<body>
    <section id="header">
    <a href="#"><img src="../Image/logo1.png" class="logo" alt=""></a>
        
        <div>
            <ul id="navbar">
                <li><a href="../HTML/Home.php">Home</a></li>
                <li><a href="../HTML/Workout.php">Workout</a></li>
                <li><a href="../HTML/blog.php">Blog</a></li>
                <li><a class="../HTML/active" href="Tools.php">Tools</a></li>
                <li><a href="../HTML/contact.php" >Contact</a></li>
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

    <h1>Collection</h1>
    <div class="card-container">
        <a href="CARDIO WORKOUT.pdf" class="card-link" target="_Blank">
            <div class="card">
                <img src="../Image/pdf/cardio.jpg" alt="PDF Cover Page 1">
            </div>
        </a>
        <a href="ABS_WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Abs.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="ARMS WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Arm.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="BACK WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Back.png" alt="PDF Cover Page 2">
            </div>
        </a>

        <a href="CHEST WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Chest.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="COMBACT STRENGTH WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Combact.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="FAT BURNING WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Fat Burning.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="LEG WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Leg.png" alt="PDF Cover Page 2">
            </div>
        </a>

        <a href="SHOULDERS WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Shoulder.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="STRENGTH TRAINING WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Strength.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="COMBACT STRENGTH WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Combact.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <a href="FAT BURNING WORKOUT.pdf" class="card-link"target="_Blank">
            <div class="card">
                <img src="../Image/pdf/Fat Burning.png" alt="PDF Cover Page 2">
            </div>
        </a>
        <!-- Add more cards as needed -->
    </div>
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

    </footer>
    <marquee style="font-size:20pt;" bgcolor="#fcba03"loop="-1" scrollamount="7" width="100%">"Be the best version of yourself, every single day." - Davin</marquee>

    <script src="../JavaScript/script.js"></script>

    <script>
    function scrollToProducts() {
        var productsSection = document.getElementById("gym");
        productsSection.scrollIntoView({ behavior: 'smooth' });
    }
    </script>
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
</body>
</html>
