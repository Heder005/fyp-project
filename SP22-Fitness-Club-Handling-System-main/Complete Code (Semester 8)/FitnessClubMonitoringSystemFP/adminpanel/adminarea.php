<?php 

include('../db/connection.php');
if(session_id()=='')
{
    session_start();
}
$uType='';
$admin_email='';
if (isset($_SESSION['uType']))
{
    $uType=$_SESSION['uType'];
}

if (isset($_SESSION['username']))
{
    $admin_email = $_SESSION['username'];
}

//echo '<script type="text/javascript"> alert("Veriable Value = ' .$admin_email.' ")</script>';

// if(!isset($_SESSION['username']) ) {
 
//        echo "<script>window.open('index.php', '_self')</script>";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fitness Club Handling System</title>
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    

    <div class="wrapper">
        <div class="row admin_bar">
            <span>Welcome Fitness Club Handling System</span>
            <a href="logout.php">Log Out</a>
        </div>

        <div class="row">
            <div class="col s3 m3 l3" style="padding: 0 !important;">
                <ul class="cat_list" id="nav_height" style="min-height: 515px;">
                    <li style="display:none;"><a href="adminarea.php?welcome" id="welcome"></a></li>
                    <!-- <li class="<?php if(isset($_GET['add_session'])){echo "active"; } ?>"><a href="adminarea.php?add_session">Add Training Session</a></li>
                    <li class="<?php if(isset($_GET['view_session'])){echo "active"; } ?>"><a href="adminarea.php?view_session">View All Sessions</a></li>
                    <hr> -->
                    <li class="<?php if(isset($_GET['add_trainer'])){echo "active"; } ?>"><a href="adminarea.php?add_trainer">Add Trainer Schedule</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['view_trainers'])){echo "active"; } ?>"><a href="adminarea.php?view_trainers">View All Trainers Schedule</a></li>
                    <hr>
                    <?php
                    if($admin_email =="admin@gmail.com")
                    {
                    
                    ?>
                   
                    <li class="<?php if(isset($_GET['add_equipments'])){echo "active"; } ?>"><a href="adminarea.php?add_equipments">Add Equipments</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['view_equipments'])){echo "active"; } ?>"><a href="adminarea.php?view_equipments">View All Equipments</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['viewUsers'])){echo "active"; } ?>"><a href="adminarea.php?viewUsers">View All Users</a></li>
                    <hr>
                    <?php } ?>
                    <li class="<?php if(isset($_GET['MarkAttendance'])){echo "active"; } ?>"><a href="adminarea.php?MarkAttendance">Mark Attendance</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['ViewAttendance'])){echo "active"; } ?>"><a href="adminarea.php?ViewAttendance">View Attendance</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['all_reservations'])){echo "active"; } ?>"><a href="adminarea.php?all_reservations">View All Reservations</a></li>
                    <hr>
                    <?php
                    if($admin_email <>"admin@gmail.com")
                    {
                        ?>
                    <li class="<?php if(isset($_GET['dietplan'])){echo "active"; } ?>"><a href="adminarea.php?dietplan">Diet Plan Schedule</a></li>
                    <hr>
                    <?php } ?>
                    <li class="<?php if(isset($_GET['dietplan_view'])){echo "active"; } ?>"><a href="adminarea.php?dietplan_view">View Diet Plan</a></li>
                    <hr>
                    <li class="<?php if(isset($_GET['viewFeedbackRating'])){echo "active"; } ?>"><a href="adminarea.php?viewFeedbackRating">View Feedback Rating</a></li>
                </ul>
            </div>
            <div class="col s9 m9 l9 admin_section">
                <div id="content_height">
                <?php 
                
                if(isset($_GET['add_session'])) {
                    include("add_session.php");
                }
                
                else if(isset($_GET['view_session'])) {
                    include("view_session.php");
                }

                else if(isset($_GET['edit_session'])) {
                    include("edit_session.php");
                }

                else if(isset($_GET['delete_instructor'])) {
                    include("delete_instructor.php");
                }

                else if(isset($_GET['add_trainer'])) {
                    include("add_trainer.php");
                }

                else if(isset($_GET['view_trainers'])) {
                    include("view_trainers.php");
                }
                else if(isset($_GET['add_equipments'])) {
                    include("add_equipments.php");
                }

                else if(isset($_GET['view_equipments'])) {
                    include("view_equipments.php");
                }
                else if(isset($_GET['viewUsers'])) {
                    include("viewUsers.php");
                }
                else if(isset($_GET['MarkAttendance'])) {
                    include("MarkAttendance.php");
                }
                else if(isset($_GET['ViewAttendance'])) {
                    include("ViewAttendance.php");
                }
                else if(isset($_GET['edit_trainer'])) {
                    include("edit_trainer.php");
                }

                else if(isset($_GET['all_reservations'])) {
                    include("all_reservations.php");
                }
                else if(isset($_GET['dietplan'])) {
                    include("dietplan.php");
                }
                else if(isset($_GET['dietplan_view'])) {
                    include("dietplan_view.php");
                }
                else if(isset($_GET['viewFeedbackRating'])) {
                    include("viewFeedbackRating.php");
                }
                else {
                    include("welcome.php");
                }

                ?>
                </div>
            </div>
        </div>

    </div>


    <script src="../js/jQuery.js"></script>
    <script src="../js/materialize.min.js"></script>
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