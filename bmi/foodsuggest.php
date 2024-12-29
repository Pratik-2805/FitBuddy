<?php
if (isset($_GET['breakfast_fat']) && isset($_GET['breakfast_protien']) && isset($_GET['breakfast_buah_sayur']) && isset($_GET['breakfast_karbohodrat']) &&
    isset($_GET['lunch_fat']) && isset($_GET['lunch_protien']) && isset($_GET['lunch_buah_sayur']) && isset($_GET['lunch_karbohodrat']) &&
    isset($_GET['dinner_fat']) && isset($_GET['dinner_protien']) && isset($_GET['dinner_buah_sayur']) && isset($_GET['dinner_karbohodrat']) 
    && isset($_GET['interpretation']) && isset($_GET['name'])) {

    $breakfast_fat = $_GET['breakfast_fat'];
    $breakfast_protien = $_GET['breakfast_protien'];
    $breakfast_buah_sayur = $_GET['breakfast_buah_sayur'];
    $breakfast_karbohodrat = $_GET['breakfast_karbohodrat'];

    $lunch_fat = $_GET['lunch_fat'];
    $lunch_protien = $_GET['lunch_protien'];
    $lunch_buah_sayur = $_GET['lunch_buah_sayur'];
    $lunch_karbohodrat = $_GET['lunch_karbohodrat'];

    $dinner_fat = $_GET['dinner_fat'];
    $dinner_protien = $_GET['dinner_protien'];
    $dinner_buah_sayur = $_GET['dinner_buah_sayur'];
    $dinner_karbohodrat = $_GET['dinner_karbohodrat'];

    
    $interpretation = $_GET['interpretation'];
    $name = $_GET['name'];
} else {
    // Handle cases where parameters are not set
    $breakfast_fat = "No breakfast suggestions available";
    $breakfast_protien = "No breakfast suggestions available";
    $breakfast_buah_sayur = "No breakfast suggestions available";
    $breakfast_karbohodrat = "No breakfast suggestions available";

    $lunch_fat = "No lunch suggestions available";
    $lunch_protien = "No lunch suggestions available";
    $lunch_buah_sayur = "No lunch suggestions available";
    $lunch_karbohodrat = "No lunch suggestions available";

    $dinner_fat = "No dinner suggestions available";
    $dinner_protien = "No dinner suggestions available";
    $dinner_buah_sayur = "No dinner suggestions available";
    $dinner_karbohodrat = "No dinner suggestions available";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Food Suggestions - BMI & CALORIES CALCULATIONS SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <h1>Food Suggestions for <?php echo $interpretation;?> BMI</h1>
    <br>
    <h2>Breakfast</h2>
    <table>
        <tr>
            <th>Food Group</th>
            <th>Food Suggestions</th>
            <th>Suggestions Image</th>
        </tr>
        <tr>
            <td>Fat</td>
            <td><?php echo $breakfast_fat; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_breakfast_fat.jpg" alt="Fat Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_breakfast_fat.png" alt="Fat Image" width="50" height="50">';
            } else {
                echo '<img src="Else/breakfast_fat.jpg" alt="Fat Image" width="50" height="50">';
            }
            ?>
        </td>
        </tr>
        <tr>
            <td>Protein</td>
            <td><?php echo $breakfast_protien; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_breakfast_protien.png" alt="Protein Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_breakfast_protien.png" alt="Protein Image" width="50" height="50">';
            } else {
                echo '<img src="Else/breakfast_protien.png" alt="Protein Image" width="50" height="50">';
            }
            ?>
        </td>
        </tr>
        <tr>
            <td>Fruits and Vegetables</td>
            <td><?php echo $breakfast_buah_sayur; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_breakfast_buah_sayur.jpg" alt="Fruits and Vegetables Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_breakfast_buah_sayur.jpg" alt="Fruits and Vegetables Image" width="50" height="50">';
            } else {
                echo '<img src="Else/breakfast_buah_sayur.png" alt="Fruits and Vegetables Image" width="50" height="50">';
            }
            ?>
        </td>
        </tr>
        <tr>
            <td>Carbohydrates</td>
            <td><?php echo $breakfast_karbohodrat; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_breakfast_karbohodrat.jpg" alt="Carbohydrates Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_breakfast_karbohodrat.jpg" alt="Carbohydrates Image" width="50" height="50">';
            } else {
                echo '<img src="Else/breakfast_karbohodrat.jpg" alt="Fat Carbohydrates" width="50" height="50">';
            }
            ?>
        </td>
        </tr>
    </table>
    <br>

    <h2>Lunch</h2>
    <table>
        <tr>
            <th>Food Group</th>
            <th>Food Suggestions</th>
            <th>Suggestions Image</th> <!-- Add an Image column -->
        </tr>
        <tr>
            <td>Fat</td>
            <td><?php echo $lunch_fat; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_lunch_fat.jfif" alt="Fat Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_lunch_fat.jpg" alt="Fat Image" width="50" height="50">';
            } else {
                echo '<img src="Else/lunch_fat.jpg" alt="Fat Fat" width="50" height="50">';
            }
            ?>
        </tr>
        <tr>
            <td>Protein</td>
            <td><?php echo $lunch_protien; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_lunch_protien.png" alt="Protein Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_lunch_protien.jpg" alt="Protein Image" width="50" height="50">';
            } else {
                echo '<img src="Else/lunch_protien.jpg" alt="Fat Protein" width="50" height="50">';
            }
            ?>
        </tr>
        <tr>
            <td>Fruits and Vegetables</td>
            <td><?php echo $lunch_buah_sayur; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_lunch_buah_sayur.jpg" alt="Fruits and Vegetables Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_lunch_buah_sayur.jfif" alt="Fruits and Vegetables Image" width="50" height="50">';
            } else {
                echo '<img src="Else/lunch_buah_sayur.png" alt="Fat Fruits and Vegetables" width="50" height="50">';
            }
            ?>
        </tr>
        <tr>
            <td>Carbohydrates</td>
            <td><?php echo $lunch_karbohodrat; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_lunch_karbohodrat.jpg" alt="Carbohydrates Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_lunch_karbohodrat.jpg" alt="Carbohydrates Image" width="50" height="50">';
            } else {
                echo '<img src="Else/lunch_karbohodrat.jpg" alt="Fat Carbohydrates" width="50" height="50">';
            }
            ?>
        </tr>
    </table>
    <br>

    <h2>Dinner</h2>
    <table>
        <tr>
            <th>Food Group</th>
            <th>Food Suggestions</th>
            <th>Suggestions Image</th> <!-- Add an Image column -->
        </tr>
        <tr>
            <td>Fat</td>
            <td><?php echo $dinner_fat; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_dinner_fat.jpg" alt="Fat Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_dinner_fat.png" alt="Fat Image" width="50" height="50">';
            } else {
                echo '<img src="Else/dinner_fat.jpg" alt="Fat Fat" width="50" height="50">';
            }
            ?>
        </tr>
        <tr>
            <td>Protein</td>
            <td><?php echo $dinner_protien; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_dinner_protien.jpg" alt="Protein Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_dinner_protien.jpg" alt="Protein Image" width="50" height="50">';
            } else {
                echo '<img src="Else/dinner_protien.jfif" alt="Fat Protein" width="50" height="50">';
            }
            ?>
        </tr>
        <tr>
            <td>Fruits and Vegetables</td>
            <td><?php echo $dinner_buah_sayur; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_dinner_buah_sayur.png" alt="Fruits and Vegetables Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_dinner_buah_sayur.jpg" alt="Fruits and Vegetables Image" width="50" height="50">';
            } else {
                echo '<img src="Else/dinner_buah_sayur.jpg" alt="Fat Fruits and Vegetables" width="50" height="50">';
            }
            ?>
        </tr>
        <tr>
            <td>Carbohydrates</td>
            <td><?php echo $dinner_karbohodrat; ?></td>
        <td>
            <!-- Add an image here -->
            <?php
            if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                echo '<img src="Obese/obese_dinner_karbohodrat.png" alt="Carbohydrates Image" width="50" height="50">';
            } elseif ($interpretation == "Normal") {
                echo '<img src="Normal/normal_dinner_karbohodrat.jpg" alt="Carbohydrates Image" width="50" height="50">';
            } else {
                echo '<img src="Else/dinner_karbohodrat.png" alt="Fat Carbohydrates" width="50" height="50">';
            }
            ?>
        </tr>
    </table>
    <br>
    <br><br>
    
    <a href="javascript:window.close();" class="button">Close</a>
</body>
</html>
