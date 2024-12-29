


<?php
session_start();
require_once ('../php/CreateLog.php');
$database = new CreateDb("Newdb", "user");

$loggedIn = isset($_SESSION['user']);

if (isset($_POST['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    echo "<script>alert('You have been logged out!')</script>";
    echo "<script>window.location = 'home.php'</script>";
}
$result = null;
$email = '';

if (isset($_SESSION['user'])) {
    $result = $database->getUserByUsername($_SESSION['user']);
    if ($result && !empty($result)) {
        $row = $result;
        if ($row) {
            $email = $row['email'];
            $telepon = $row['telepon'];
        } else {
        }
    } else {
    }    
}

if (isset($_POST['save'])) {
    $newPhone = $_POST['phone'];
    $database->updateUserPhone($_SESSION['user'], $newPhone);

    echo "<script>alert('Phone number updated successfully!')</script>";
    echo "<script>window.location = 'profil.php'</script>";
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
                <li><a href="Workout.php">Shop</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="Tools.php">Tools</a></li>
                <li><a href="contact.php" >Contact</a></li>
                <?php if ($loggedIn) { ?>
                <!-- Tombol lg-profile hanya ditampilkan jika ada sesi pengguna aktif -->
                <li id="lg-profile"><a class="fas fa-user-alt active" onclick="togglemenu()"></a></li>
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
            <a href="cart.php "><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="profile.php "><i class="fas fa-user-alt"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="profile-details">
        <div class="people">
            <div>
                <img src="../Image/profil.png">
            </div>
            <div>
                <p><span><?php print_r($_SESSION['user']);?></span></p>
            </div>
            <div>
                <p><span><a class="active" href="#" >User Details</a></span></p>
            </div>
            <div>
                <p><span><a href="changepass.php">Change Password</a></span></p>
            </div>
            
        </div>
        <form action="" method="post">
            <span>Username</span>
            <input type="text" placeholder="Username" value="<?php echo $_SESSION['user']; ?>" readonly>
            <span>Phone number</span>
            <input type="text" placeholder="Phone number" name="phone" pattern="[0-9]{12,}" title="Phone number must have at least 12 digits and only contain numbers" value="<?php echo $telepon; ?>" required>
            <span>Email</span>
            <input type="text" placeholder="Email" value="<?php echo $email; ?>" readonly>
            <button type="submit" class="normal" name="save">Save</button>
        </form>
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

</body>
</html>