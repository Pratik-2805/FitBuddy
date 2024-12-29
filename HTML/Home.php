<?php

session_start();

require_once ('../php/CreateDb.php');
require_once ('../php/component.php');


// create instance of Createdb class
$database = new CreateDb("Newdb", "Gymtb");
if (isset($_POST['add'])){
    if (!isset($_SESSION['user'])) {
        // Jika tidak ada sesi pengguna terdeteksi, arahkan ke halaman login
        echo "<script>alert('Anda harus login terlebih dahulu')</script>";
        echo "<script>window.location = 'login.php'</script>";
        exit; // Hentikan eksekusi script setelah mengalihkan
    }
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "gym_id");
        if(in_array($_POST['gym_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart!')</script>";
        }
        else{
            $count = count($_SESSION['cart']);
            $item_array = array('gym_id' => $_POST['gym_id']);
            $_SESSION['cart'][$count] = $item_array;
            $id=$_POST['gym_id'];
            $total=$_POST['price'];
            $result = $database->UpDataId($id,$total);
            echo "<script>alert('Add Product Success!')</script>";
        }
    }
    else{
        $item_array = array(
                'gym_id' => $_POST['gym_id']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
            $id=$_POST['gym_id'];
            $total=$_POST['price'];
            $result = $database->UpDataId($id,$total);
            echo "<script>alert('Add Product Success!')</script>";
    }
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    echo "<script>alert('You have been logged out!')</script>";
    echo "<script>window.location = 'home.php'</script>";
}

$loggedIn = isset($_SESSION['user']);
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
                <li><a class="active" href="Home.php">Home</a></li>
                <li><a href="Workout.php">Workout</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="Tools.php">Tools</a></li> 
                <li><a href="contact.php" >Contact</a></li>
                <?php if ($loggedIn) { ?>
                <!-- Tombol lg-profile hanya ditampilkan jika ada sesi pengguna aktif -->
                <li id="lg-profile"><a class="fas fa-user-alt" onclick="togglemenu()"></a></li>
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

    <section id="hero">
        <h2>Action is the Foundation Key to all Success</h2>
        <h3 style="color:#E77751; margin-left:70%">~Pablo Picasso</h3>
        <p>Save more with coupons up to <span>40% OFF</span></p>
        <button onclick="scrollToProducts()" class="hero_button">Join Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="../Image/features/f1.png" alt="">
            <h6>Full Online</h6>
        </div>

        <div class="fe-box">
            <img src="../Image/features/f2.png" alt="">
            <h6>Time Efficient</h6>
        </div>
        <div class="fe-box">
            <img src="../Image/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="../Image/features/f4.png" alt="">
            <h6>Promotion</h6>
        </div>
        <div class="fe-box">
            <img src="../Image/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="../Image/features/f6.png" alt="">
            <h6>24/7 Support</h6>
        </div>
    </section>

    <div class="text">
        <h2>Featured Gym</h2>
        <p>Premium Gym With Excellent Gear</p>
    </div>

    

    <section id="gym" >
        <div class="pro-container">
        <div class="pro">
        <form action="" method="post">
                <a href="Fullbody.php" style="text-decoration: none;">
                    <img src="../Image/Fullbody.jpeg" alt="">
                    <div class="des">
                        <span>Easy</span>
                        <h4 style="color: black;">Fullbody</h4> 
                        <h5>Exercies: <span>Neck Stretch, Shoulder Stretch, Triceps Stretch, Chest Opene, Cat-Cow Stretch, Child's Pose, Quadriceps Stretch</span></h5>
                    </div>
                </a>
        </form>
        </div>
        <div class="pro">
        <form action="" method="post">
                <a href="Arms.php" style="text-decoration: none;">
                    <img src="../Image/Arms.jpg" alt="">
                    <div class="des">
                        <span>Easy</span>
                        <h4 style="color: black;">Arms</h4> 
                        <h5>Exercies: <span>Biceps Curl, Forearm Curl, Bendover Biceps Curl, Overhead Tricep Extension</span></h5>
                    </div>
                </a>
        </form>
        </div>
        <div class="pro">
        <form action="" method="post">
                <a href="Chest.php" style="text-decoration: none;">
                    <img src="../Image/Chest.jpg" alt="">
                    <div class="des">
                        <span>Easy</span>
                        <h4 style="color: black;">Chest</h4> 
                        <h5>Exercies: <span>Push-Ups, Bench Press, Incline Bench Press</span></h5>
                    </div>
                </a>
        </form>
        </div>

            <div class="pro">
            <form action="" method="post">
                <a href="Abs.php" style="text-decoration: none;">
                    <img src="../Image/abs.jpg" alt="">
                    <div class="des">
                        <span>Easy</span>
                        <h4 style="color: black;">Abs</h4> 
                        <h5>Exercies: <span>Leg Raises, Hanging Leg Raises, Superman</span></h5>
                    </div>
                </a>
            </form>
            </div>
        <div class="pro">
        <form action="" method="post">
                <a href="Back.php" style="text-decoration: none;">
                    <img src="../Image/Back.jpg" alt="">
                    <div class="des">
                        <span>Easy</span>
                        <h4 style="color: black;">Back</h4> 
                        <h5>Exercies: <span> Pull-Up, Barbell Rows, Dumbell Rows, Incline Dumbbell Rows</span></h5>
                    </div>
                </a>
        </form>
        </div>
        <div class="pro">
        <form action="" method="post">
                <a href="Legs.php" style="text-decoration: none;">
                    <img src="../Image/Legs.jpg" alt="">
                    <div class="des">
                        <span>Easy</span>
                        <h4 style="color: black;">Leg</h4> 
                        <h5>Exercies: <span> Barbell Squat, Split Squat, Leg Press, Goblet Squat, Calf Raises</span></h5>
                    </div>
                </a>
        </form>
        </div>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Big Sale</h4>
        <h2>Up to <span>50% OFF</span> - All Gym</h2>
        <button class="normal">Explore More</button>
    </section>

   
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best gym in your arena is on sale</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomming season</h2>
            <span>build your body for the next season</span>
            <button class="white">Learn More</button>
        </div>
    </section>

    <section id="banner3" >
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Spring Collection -30% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW GYM COLLECTION</h2>
            <h3>Spring 2023</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>TOP RATED GYM</h2>
            <h3>5 <span>★</span> Gym Only</h3>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special Offers.</span></p>
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

    <script src="../JavaScript/script.js"></script>
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
        function scrollToProducts() {
        var productsSection = document.getElementById("gym");
        productsSection.scrollIntoView({ behavior: 'smooth' });
    }
    </script>
</body>
</html>