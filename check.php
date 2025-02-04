<?php

session_start();

$conn = mysqli_connect('localhost','root','','project');

if(!empty($_POST['b-menu'])){
foreach($_POST['b-menu'] as $selected1){
    $query1 = "select food_id from food_list where food_name='$selected1'";
    $result1=mysqli_query($conn, $query1);
    $array1 = mysqli_fetch_assoc($result1);

    $update_query1 = "update breakfast_votes set votes = votes+1 where food_id = '$array1[food_id]'";
    mysqli_query($conn, $update_query1);
}
}

if(!empty($_POST['l-menu'])) {
foreach($_POST['l-menu'] as $selected2){
    $query2 = "select food_id from food_list where food_name='$selected2'";
    $result2=mysqli_query($conn, $query2);
    $array2 = mysqli_fetch_assoc($result2);

    $update_query2 = "update lunch_votes set votes = votes+1 where food_id = '$array2[food_id]'";
    mysqli_query($conn, $update_query2);
}
}

if(!empty($_POST['s-menu'])) {
foreach($_POST['s-menu'] as $selected3){
    $query3 = "select food_id from food_list where food_name='$selected3'";
    $result3=mysqli_query($conn, $query3);
    $array3 = mysqli_fetch_assoc($result3);

    $update_query3 = "update snacks_votes set votes = votes+1 where food_id = '$array3[food_id]'";
    mysqli_query($conn, $update_query3);
}
}

if(!empty($_POST['d-menu'])){
foreach($_POST['d-menu'] as $selected4){
    $query4 = "select food_id from food_list where food_name='$selected4'";
    $result4=mysqli_query($conn, $query4);
    $array4 = mysqli_fetch_assoc($result4);

    $update_query4 = "update dinner_votes set votes = votes+1 where food_id = '$array4[food_id]'";
    mysqli_query($conn, $update_query4);
}
}

$update_b_perc = "update breakfast_votes set votes = votes+0; ";
mysqli_query($conn, $update_b_perc);

$update_l_perc = "update lunch_votes set votes = votes+0; ";
mysqli_query($conn, $update_l_perc);

$update_s_perc = "update snacks_votes set votes = votes+0; ";
mysqli_query($conn, $update_s_perc);

$update_d_perc = "update dinner_votes set votes = votes+0; ";
mysqli_query($conn, $update_d_perc);

header('location: home.php');
?>