<?php 

session_start();
include('db/connection.php');

if (!isset($_SESSION['student_email']))
{
    echo "<script>window.open('index.php', '_self')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitness Club Handling System</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    
    <div class="wrapper">
        <nav>
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo left"><img src="images/logo.png" alt="Logo" style="width: 35px; position: relative; top: 8px;">  Fitness Club </a>
                <ul class="right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="trainers.php">Trainers</a></li>
                    <li><a href="equipments.php">Equipments</a></li>
                    <?php 

                    if (isset($_SESSION['student_email']))
                    {
                        echo "<li><a href='my_account.php' class='waves-effect waves-light btn'>Profile</a></li>";
                        echo "<li><a href='logout.php' class='waves-effect waves-light btn'>Log Out</a></li>";
                    }

                    else {
                        echo "<li><a href='register.php' class='waves-effect waves-light btn'>Login | Register</a></li>";
                    }
                    echo "<li><a href='adminpanel/index.php' class='waves-effect waves-light btn'>Admin</a></li>";
                    ?>
                </ul>
            </div>
        </nav>

        <!--**************************************************************** -->


        <div class="row" style="margin-top: 20px;">
            <div class="col s3 m3 l3" style="padding: 0 !important;">
                <ul class="cat_list" id="nav_height" style="min-height: 515px;">
                    <li style="display:none;"><a href="index.php?welcome" id="welcome"></a></li>
                    <li class="<?php if(isset($_GET['my_reservation'])){echo "active"; } ?>"><a href="my_account.php?my_reservation">My Reservation</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['all_reservation'])){echo "active"; } ?>"><a href="my_account.php?all_reservation">All Reservations</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['weight_lift'])){echo "active"; } ?>"><a href="my_account.php?weight_lift">Weight Lift</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['view_weight'])){echo "active"; } ?>"><a href="my_account.php?view_weight">View Weight Lift</a></li>
                </ul>
            </div>
            <div class="col s9 m9 l9 admin_section">
                <div id="content_height">
                <?php 
                
                if(isset($_GET['my_reservation'])) {
                    include("my_reservation.php");
                }
                
                else if(isset($_GET['all_reservation'])) {
                    include("all_reservation.php");
                }

                else if(isset($_GET['final_test'])) {
                    include("final_test.php");
                }
                else if(isset($_GET['weight_lift'])) {
                    include("weight_lift.php");
                }
                else if(isset($_GET['view_weight'])) {
                    include("view_weight.php");
                }
                else {
                    include("welcome.php");
                }

                ?>
                </div>
            </div>
        </div>


        <div class="footer">
            copyright &copy; 2022 |
            <a href="adminpanel/index.php" target="_blank" style="font-size: 14px; color: #fff;">Fitness Club Handling System</a>
        </div>

    </div>

    <script src="js/jQuery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>

<script>
        
        // Admin Page Navigation Height adjustment with content
        function setHeight() {
          
          var contentHeight = document.getElementById('content_height').offsetHeight;
          
          var contentValue = contentHeight + "px";
          
          // var navHeight = document.getElementById('nav_height').offsetHeight;
          document.getElementById('nav_height').style.height= contentValue;
          
          }
            </script>
        
            <script>window.onload = setHeight;</script>

</body>
</html>