<?php
session_start();

require_once ('../php/CreateDb.php');
require_once ('../php/component.php');
$loggedIn = isset($_SESSION['user']);
$database = new CreateDb("Gymdb", "Gymtb");

$data = $database->getData(); // Menggunakan metode getData() untuk mengambil semua data

$gymId = isset($_GET['gym_id']) ? $_GET['gym_id'] : null; // Mendapatkan nilai gym_id dari parameter

// Lakukan pengolahan data sesuai dengan gym_id yang diterima
if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "gym_id");
        if(in_array($_POST['gym_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
        }
        else{
            $count = count($_SESSION['cart']);
            $item_array = array('gym_id' => $_POST['gym_id']);
            $_SESSION['cart'][$count] = $item_array;
            $id=$_POST['gym_id'];
            $plan=$_POST['selected_plan'];
            $quan=$_POST['selected_quantity'];
            $total=$_POST['price'];
            if ($plan === "1") {
                $harga = $total * $quan;
              } else if ($plan === "3") {
                $harga = $total * $quan * 3 * 0.85;
              } else if ($plan === "6") {
                $harga = $total * $quan * 6 * 0.75;
              } else if ($plan === "12") {
                $harga = $total * $quan * 12 * 0.65;
              }
            $result = $database->UpDataById($id,$plan,$quan,$harga);
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
            $plan=$_POST['selected_plan'];
            $quan=$_POST['selected_quantity'];
            $total=$_POST['price'];
            $harga=0;
            if ($plan === "1") {
                $harga = $total * $quan;
              } else if ($plan === "3") {
                $harga = $total * $quan * 3 * 0.85;
              } else if ($plan === "6") {
                $harga = $total * $quan * 6 * 0.75;
              } else if ($plan === "12") {
                $harga = $total * $quan * 12 * 0.65;
              }
            $result = $database->UpDataById($id,$plan,$quan,$harga);
            echo "<script>alert('Add Product Success!')</script>";
    }   
}
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
    <link rel="stylesheet" href="../CSS/Fullbody.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="../Image/logo1.png" class="logo" alt=""></a>
        
        <div>
            <ul id="navbar">
                <li><a href="Home.php">Home</a></li>
                <li><a class="" href="Workout.php">Workout</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="Tools.php">Tools</a></li>
                <li><a href="contact.php" >Contact</a></li>
                <?php if ($loggedIn) { ?>
                <li id="lg-profile"><a class="fas fa-user-alt" onclick="togglemenu()"></a></li>
                <?php } ?>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="../Image/profil.png">
                        <h2><?php echo $_SESSION['user']?></h2>
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
            <div id="mobile">
                <a href="Cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                <?php if ($loggedIn) { ?>
                <a onclick="togglemenu()"><i class="fas fa-user-alt"></i></a>
                <?php } ?>
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </div>
    </section>

<!--Content-->
    <div class="content">
    <h1>Abs</h1>
    <div class="Legraises">
        <h2>Leg Raises</h2>
        <hr>
        <h5>Difficulty: Easy</h5>
        <video controls muted src="..\video\Leg raises.mp4" width="30%"></video>
        <ol class="tips">
            <li>Lay on your back with your arms palms down on either side.</li>
            <li>Keep your legs together and as straight as possible.</li>
            <li>Slowly raise your legs to a 90° angle, pause at this position, or as high as you can reach your legs, and then slowly lower your legs back down.</li>
            <li>Duration of these movements should be slow so that you do not utilize momentum, enabling you to get the most out of the exercise.</li>
            <li>Repeat.</li>
        </ol>
    </div>
    
    <div class="Hangingraises">
        <h2>Hanging Leg Raises</h2>
        <hr>
        <h5>Difficulty: Intermediate</h5>
        <video controls muted src="..\video\Hanging leg raises.mp4" width="30%"></video>
        <ol class="tips">
            <li>Grab the bar and hang, your body still and your legs straight.</li>
            <li>Slowly draw your knees up to your chest</li>
            <li>Once you have raised your knees as high as possible, lower your legs and repeat. Duration of these movements should be slow so that you do not utilize momentum, enabling you to get the most out of the exercise.</li>
            <li>Duration of these movements should be slow so that you do not utilize momentum, enabling you to get the most out of the exercise.</li>
            <li>Repeat.</li>
        </ol>
    </div>

    <div class="Superman">
        <h2>Superman</h2>
        <hr>
        <h5>Difficulty: Intermediate</h5>
        <video controls muted src="..\video\Superman.mp4" width="30%"></video>
        <ol class="tips">
            <li>Lie face down on the floor with your arms fully extended in front of you.</li>
            <li>Simultaneously raise your arms, legs and chest off of the floor and hold the position.</li>
            <li>Slowly lower your arms, legs and chest back to the starting position. Repeat.</li>
            <li>Repeat.</li>
        </ol>
    </div>
    </div>

    
    <br>
    <br>
    <br>
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

        // Ambil elemen tombol minus, tombol plus, dan elemen nilai jumlah
        var minusButton = document.querySelector('.quantity-button.minus');
        var plusButton = document.querySelector('.quantity-button.plus');
        var quantityValue = document.getElementById('quantity-value');

        // Tambahkan event listener untuk tombol minus
        minusButton.addEventListener('click', function() {
        var currentValue = parseInt(quantityValue.textContent);
        if (currentValue > 1) {
            quantityValue.textContent = currentValue - 1;
        }
        });

        // Tambahkan event listener untuk tombol plus
        plusButton.addEventListener('click', function() {
        var currentValue = parseInt(quantityValue.textContent);
        if (currentValue < 9999) {
            quantityValue.textContent = currentValue + 1;
        }
        });

        // Mengambil semua tombol pilihan bulan
        const monthButtons = document.querySelectorAll('.btn-group button');

        // Memberikan event listener pada setiap tombol pilihan bulan
        monthButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Menghapus kelas 'active' dari semua tombol pilihan bulan
            monthButtons.forEach(btn => btn.classList.remove('active'));
            // Menambahkan kelas 'active' pada tombol yang ditekan
            this.classList.add('active');
        });
        });
    </script>
    <script>
        // Fungsi untuk mengatur nilai-nilai yang akan dikirim saat formulir di-submit
        function setFormValues() {
        // Mendapatkan nilai dari elemen-elemen yang ingin dikirim
        var selectedQuantity = document.getElementById('quantity-value').innerText;
        var selectedPlan = document.querySelector('.btn-group .active').value;

        // Mengatur nilai-nilai ke atribut value pada elemen input tersembunyi
        document.getElementById('selected-quantity').value = selectedQuantity;
        document.getElementById('selected-plan').value = selectedPlan;
        }
    
        // Event listener pada saat formulir di-submit
        document.querySelector('#detailform').addEventListener('submit', function (event) {
        setFormValues(); // Memanggil fungsi untuk mengatur nilai-nilai yang akan dikirim
        // event.preventDefault(); // Jika diperlukan untuk mencegah submit formulir secara default
        });
    </script>
    <script src="../JavaScript/script.js"></script>

    <style>
        h1{
            position: relative;
            font-size: 50px;
            line-height: 64px;
            color: #222; 
        }
         h2{
            position: relative;
            top: 40px;
            margin-left: 20%;
        }
         hr{
            position: relative;
            top: 10px;
            width: 70%;
            margin: 0 auto;
        }
         h5{
            position: relative ;
            top: 40px;
            margin-left: 20%;
            
        }
         video{
            position: relative;
            top: 30px;
            left: 35%;
        }
        .tips{
            position: relative;
            top: 30px;
            left: 20%;
            width: 55%;
            padding: 3px;
            font-size: 16px;
            
        }
         ol li{
            color: rgb(0, 0, 0);
            margin-top: 5px;
            
            padding-left: 5px;
        }
         ol{
            color: black;
        }
    </style>
</body>
</html>