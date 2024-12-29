const calorieForm = document.getElementById("calorie-form");
const calorieSubmit = document.getElementById("calorie-submit");

// Calorie Calculator:
calorieSubmit.addEventListener("click", function (event) {
    // Declarations:
    let bmr, need;
    const gender = document.getElementsByName("gender");
    const age = parseInt(document.getElementById("age").value);
    const height = parseFloat(document.getElementById("calorie-height").value);
    const weight = parseFloat(document.getElementById("calorie-weight").value);
    const activity = document.getElementById("activity").selectedIndex;
  
    // Inputs are valid:
    if (age <= 80 && age >= 15 && height > 0 && weight > 0) {
      // Male:
      if (gender[0].checked) {
        bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
      }
      //Female:
      else if (gender[1].checked) {
        bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
      }
      // Gender unchecked:
      else {
        alert("Please enter a valid input!");
        return;
      }
      if (activity == 0) need = bmr;
      else if (activity == 1) need = bmr * 1.2;
      else if (activity == 2) need = bmr * 1.465;
      else if (activity == 3) need = bmr * 1.375;
      else if (activity == 4) need = bmr * 1.55;
      else if (activity == 5) need = bmr * 1.725;
      else need = bmr * 1.9;
  
      document.getElementById("calorie-result").innerHTML = "YOUR CALORIE NEEDING = " + Math.round(need) + " cal/day";
    }
    // Inputs are invalid:
    else
      alert("Please enter a valid input!");
  });
  // *****************