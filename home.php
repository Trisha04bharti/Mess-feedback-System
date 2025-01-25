<?php 

session_start();

 $username = $_SESSION['username']; 

$conn = mysqli_connect('localhost','root','','project');

$query1 = "select food_name from food_list where food_type='B'";
$result1= mysqli_query($conn, $query1);
$query2 = "select food_name from food_list where food_type='L'";
$result2= mysqli_query($conn, $query2);
$query3 = "select food_name from food_list where food_type='S'";
$result3= mysqli_query($conn, $query3);
$query4 = "select food_name from food_list where food_type='D'";
$result4= mysqli_query($conn, $query4);

$top_b_query = "SELECT a.food_id,a.food_name,b.percentage from food_list a,votes_percentage b where a.food_id=b.food_id and a.food_id BETWEEN 1 and 10 ORDER BY percentage DESC limit 3";
$top_b = mysqli_query($conn, $top_b_query);

$top_l_query = "SELECT a.food_id,a.food_name,b.percentage from food_list a,votes_percentage b where a.food_id=b.food_id and a.food_id BETWEEN 11 and 20 ORDER BY percentage DESC limit 3";
$top_l = mysqli_query($conn, $top_l_query);

$top_s_query = "SELECT a.food_id,a.food_name,b.percentage from food_list a,votes_percentage b where a.food_id=b.food_id and a.food_id BETWEEN 21 and 30 ORDER BY percentage DESC limit 3";
$top_s = mysqli_query($conn, $top_s_query);

$top_d_query = "SELECT a.food_id,a.food_name,b.percentage from food_list a,votes_percentage b where a.food_id=b.food_id and a.food_id BETWEEN 31 and 40 ORDER BY percentage DESC limit 3";
$top_d = mysqli_query($conn, $top_d_query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mess feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<body style="background-image: url('home.jpg');">

    <!--Nav-bar-->
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <a class="navbar-brand" id="big" href="#"><b>MESS FEEDBACK</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">

                <a class="nav-item nav-link" href="home.php"><i class="fa fa-fw fa-home"></i>Home</i></a>
                <a class="nav-item nav-link" href="user.php"><i class="fa fa-fw fa-user"></i><?php echo $_SESSION['username']; ?></i></a>
                <a class="nav-item nav-link" href="logout.php"><i class="fa fa-fw fa-power-off"></i>Logout</i></a>
            </div>
        </div>
    </nav>

    <!--Jumbotron-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-4">Welcome! To IIITA GH3 Mess!!</h3>
            <p class="lead">
                Here we intend to provide nutricious and quality food for the students living in the hostel .Started on this college has been running flawlesly so far ,so has been the hostels. There are three hostels with their one mess serving food to students since the college started.
                <br> We hope to keep providing good food to the students in the future as well.<br>Kindly give your valuable inputs to make your mess better.
            </p>
        </div>
    </div>


    <!-- Menu -->
    <br>

    <h4 class="display-4 text-center">Today's Menu</h4>
    <div id="menu" class="container">

        <div class="row card-deck mb-5 mt-5">
            <div class="col-md-3 col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center">Breakfast</h5>
                        <p class="text-muted text-center">Timing: 8:00AM - 10:00AM</p>
                        <hr>
                        <div id="breakfast" class="carousel slide" data-ride="carousel" data-interval="2500">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="#" id="breakfastimg" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center">Lunch</h5>
                        <p class="text-muted text-center">Timing: 1:00PM - 3:00PM</p>
                        <hr>
                        <div id="lunch" class="carousel slide" data-ride="carousel" data-interval="2500">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="#" id="lunchimg" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center">Snack</h5>
                        <p class="text-muted text-center">Timing: 4:30PM - 5:15PM</p>
                        <hr>
                        <div id="snack" class="carousel slide" data-ride="carousel" data-interval="2500">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="#" id="snacksimg" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center">Dinner</h5>
                        <p class="text-muted text-center">Timing: 8:00PM - 10:00PM</p>
                        <hr>
                        <div id="Dinner" class="carousel slide" data-ride="carousel" data-interval="2500">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="#" id="dinnerimg" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <!--Feedback button-->
    <center>
        <h1 class="display-4">Give quality, service and staff feedback!</h1>
    </center>
    <center><a href="feedback.php"><button class="btn btn-primary fb-btn" style="height:60px;margin:30px; width:300px;" ><h4>Give Feedback</h4></button></a></center>

    <!--Menu card buttons-->
    <hr>
    <div class="btn-center">
        <button class="btn btn-primary menu-btn" id="breakfast-btn">Breakfast</button>
        <button class="btn btn-primary menu-btn" id="lunch-btn">Lunch</button>
        <button class="btn btn-primary menu-btn" id="snacks-btn">Snacks</button>
        <button class="btn btn-primary menu-btn" id="dinner-btn">Dinner</button>
    </div>

    <!-- Menu-card -->
    <div id="check" class="container">
        <div class="flex">
            <div class="menu-card" id="menucard-b">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Breakfast</h5>
                        <h6 class="card-subtitle text-muted" style="text-align:center">Choose 7 options for the menu</h6>
                        <hr>
                        <form id="breakfast-select" name="breakfast" action="check.php" method="POST">
                            <div class="menu-items">
                                <div class="menu-1">
                                    <?php 
                                        while($food1 = mysqli_fetch_assoc($result1))
                                        {
                                    ?>
                                    <div class="checkbox"><label><input type="checkbox" value=<?php  echo '"'.$food1['food_name'].'"' ?> name="b-menu[]" onclick="return checkboxlimit()"><?php echo $food1['food_name']; ?></label></div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="submit-center">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="check" class="container">
        <div class="flex">
            <div class="menu-card" id="menucard-l">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Lunch</h5>
                        <h6 class="card-subtitle text-muted" style="text-align:center">Choose 7 options for the menu</h6>
                        <hr>
                        <form id="breakfast" name="breakfast" action="check.php" method="POST">
                            <div class="menu-items">

                                <div class="menu-1">
                                    <?php 
                                        while($food2 = mysqli_fetch_assoc($result2))
                                        {
                                    ?>
                                    <div class="checkbox"><label><input type="checkbox" value=<?php  echo '"'.$food2['food_name'].'"' ?> name="l-menu[]" onclick="return checkboxlimit1()"><?php echo $food2['food_name'] ?></label></div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="submit-center">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="check" class="container">
        <div class="flex">
            <div class="menu-card" id="menucard-s">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Snacks</h5>
                        <h6 class="card-subtitle text-muted" style="text-align:center">Choose 7 options for the menu</h6>
                        <hr>
                        <form id="breakfast" name="breakfast" action="check.php" method="POST">
                            <div class="menu-items">

                                <div class="menu-1">
                                    <?php 
                                        while($food3 = mysqli_fetch_assoc($result3))
                                        {
                                    ?>
                                    <div class="checkbox"><label><input type="checkbox" value=<?php  echo '"'.$food3['food_name'].'"' ?> name="s-menu[]" onclick="return checkboxlimit3()"><?php echo $food3['food_name'] ?></label></div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="submit-center">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="check" class="container">
        <div class="flex">
            <div class="menu-card" id="menucard-d">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center">Dinner</h5>
                        <h6 class="card-subtitle text-muted" style="text-align:center">Choose 7 options for the menu</h6>
                        <hr>
                        <form id="breakfast" name="breakfast" action="check.php" method="POST">
                            <div class="menu-items">

                                <div class="menu-1">
                                    <?php 
                                        while($food4 = mysqli_fetch_assoc($result4))
                                        {
                                    ?>
                                    <div class="checkbox"><label><input type="checkbox" value=<?php  echo '"'.$food4['food_name'].'"' ?> name="d-menu[]" onclick="return checkboxlimit3()"><?php echo $food4['food_name'] ?></label></div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="submit-center">
                                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br>

<!-- Display top item card -->

<div class="container-c">
<div class="coloumn">
    <div class="card-t">
       
    <center><h4><b>Top 3 breakfast item</b></h4><hr></center>
    <?php 
        while($top_b_result=mysqli_fetch_assoc($top_b))
            {
                ?> 
               <center><p><?php echo $top_b_result['food_name']." ".$top_b_result['percentage']."% "?></p></center>
            <?php
            }
         ?>
     </div>    
  </div>
  <div class="coloumn">
  <div class="card-t">
  <center><h4><b>Top 3 lunch item</b></h4><hr></center>
    <?php 
            while($top_l_result=mysqli_fetch_assoc($top_l))

         {
            ?> 
            <center><p><?php echo $top_l_result['food_name']." ".$top_l_result['percentage']."% "; ?></p></center>
        <?php
            }
         ?>
       </div>
  </div>
  <div class="coloumn">
  <div class="card-t">
  <center><h4><b>Top 3 snacks item</b></h4><hr></center>
    <?php 
        while($top_s_result=mysqli_fetch_assoc($top_s))
            {
                ?> 
                <center><p><?php echo $top_s_result['food_name']." ".$top_s_result['percentage']."% "; ?></p></center>
            <?php
            }
         ?>
         </div>
  </div>
  <div class="coloumn">
  <div class="card-t">
  <center><h4><b>Top 3 dinner item</b></h4><hr></center>
    <?php 
        while($top_d_result=mysqli_fetch_assoc($top_d))
            {
                ?> 
                <center><p><?php echo $top_d_result['food_name']." ".$top_d_result['percentage']."% "; ?></p></center>
            <?php
            }
         ?>
  </div>
</div>
        </div>    

    <!-- Footer -->
    <div>
        <footer class="page-footer bg-dark">
            <div>
                <p style="color:white" class="h6 text-center footer-copyright p-3">Crafted with <span style="color: deeppink">Love</span></p>
                <div class="contact-footer">
                    <span>Contact Us</span>
                    <span>Email : iiitamess@gmail.com Phone number : 1234567890</span>
                </div>
            </div>
        </footer>
    </div>

    <script src="main.js"></script>

</body>

</html>
