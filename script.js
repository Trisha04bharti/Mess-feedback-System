onload = function change() {
    today = new Date();
    day = today.getDay();
    console.log(today, day);
    document.getElementById('breakfastimg').src = "images/breakfast/" + day + ".jpg";
    document.getElementById('lunchimg').src = "images/lunch/" + day + ".jpg";
    document.getElementById('snacksimg').src = "images/snack/" + day + ".jpg";
    document.getElementById('dinnerimg').src = "images/dinner/" + day + ".jpg";
}