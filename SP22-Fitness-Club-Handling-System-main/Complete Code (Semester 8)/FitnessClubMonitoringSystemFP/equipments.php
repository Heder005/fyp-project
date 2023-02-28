<?php 


include('db/connection.php');

if(session_id()=='')
{
    session_start();
}  
$e_id= '';
 //echo '<script type="text/javascript"> alert("Veriable Value = ' .$_GET['e_id'].' ")</script>'; 
 if(isset($_GET['e_id']))
 {
     $e_id = $_GET['e_id'];
     $_SESSION['e_id'] = $e_id;
     $student_email='';
     if (isset($_SESSION["student_email"]))
    {
        $student_email = $_SESSION["student_email"];
    }
     $update_trainer = "update equipments set Status = 'Reserve',user_name = '$student_email' where e_id = '$e_id'";
     $run_t = mysqli_query($con, $update_trainer); 

     if($run_t) {
         echo "<script>window.alert('Equipment Info Updated Successfully')</script>";
         echo "<script>window.open('equipments.php', '_self')</script>";
     }
 }
 //ec
if (isset($_SESSION["student_email"]))
{
    $s_email = "SELECT student_id FROM students where student_email = '$_SESSION[student_email]'";
    $run_s = mysqli_query($con, $s_email);

    $ss_email = mysqli_fetch_assoc($run_s);
    $current_student_id = $ss_email['student_id'];
    global $current_student_id;
}
if(isset($_POST['search']))
{
    $search = $_POST['txtSearch'];
    $_SESSION["search"] = $search;
    // echo '<script type="text/javascript"> alert("Veriable Value = ' .$search.' ")</script>'; 
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

   <style>
    table th {
        text-align: center;
        background: #dbdbdb;
    }

    table tr td {
        text-align: center;
        border-bottom: 1px solid #dbdbdb;
    }

    [type="submit"].enroll_btn {
        width: 100px;
        background: #181818;
        color: #fff;
        border: none;
        font-size: 15px;
        padding: 8px 0;
    }
   </style>
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
        <div class="clearfix"></div>
        <br>
        <form method="post" class="customer_account_page"> 
            <div class="row" style="width: 100%">
    
            <div class="col-md-4" style="float: left"><span class="pull-right"> <input  type="text" name="txtSearch" id="txtSearch" value="<?php ?>" text class="form-control form-control-lg rounded-0 border-primary" placeholder="Enter Equipment Name to Search..." style="width:500px"/></span></div>
            <input type="submit" class='enroll_btn' name="search" id="search" value="Search" />
            </div>
        </form>

        <div class="row">

        <?php 
        
        $search='';
        if (isset($_SESSION["search"]))
        {
            $search=$_SESSION["search"];
        }
        
        // Display Course
        $get_pro = "select * from equipments where equipment_name  like '%$search%' and (equipments.Status = '' or equipments.Status IS null) ";
        $run_pro = mysqli_query($con, $get_pro);
        $_SESSION["search"]='';
        
        while($row_pro = mysqli_fetch_array($run_pro)) {

            $e_id = $row_pro['e_id'];
           
            $equipment_name = $row_pro['equipment_name'];
            $total_weight = $row_pro['total_weight'];
            // $course_duration = $row_pro['course_duration'];
            $equipment_image = $row_pro['equipment_image'];
            // $course_details = $row_pro['course_details'];

            echo "
                <div class='col l3 m3 s3 course_grid z-depth-2' style='margin-top: 15px;'>
                    <a href='equipments.php?e_id=$e_id'><img src='adminpanel/equipments/$equipment_image' alt='Table' style='min-height: 200px;'></a>
                    <span class='name z-depth-1'>$equipment_name</span>
                    ";
                    
                    if (isset($_SESSION['student_email']))
                    {
                        echo "<a href='equipments.php?e_id=$e_id' ' class='modal-trigger enroll z-depth-5'>Reserve Equipment</a>";

                    }

                    else {
                        echo "<a href='equipments.php' class='modal-trigger enroll z-depth-5'>Reserve Equipment</a>";

                    }
            
                            
             echo "   </div>
            ";

            echo " 
                            
            <!-- Modal Structure -->
            <div id='$e_id' class='modal'>
                <div class='modal-content'>
                    <h4 class='center heading customer_account_page enrollment_form' style='margin-top: 0px;'>Training Sessions</h4>
                        <input type='text' name='e_id' value='$e_id' style='display: none;' />
                        <input type='text' style='color: #0d0d0d' value='Equipment Name: $equipment_name' disabled class='center'/> ";
                  
                        if ($session_id == 3)
                        {

                            $as = "SELECT COUNT(*) FROM enrollment where e_id = '$e_id' ";
                            $run_as = mysqli_query($con, $as);
                            
                            $m_seats = mysqli_fetch_assoc($run_as);
                            $morning_seats = implode($m_seats);
                            $morning_seats = $total_weight - $morning_seats;

                            $es = "SELECT COUNT(*) FROM enrollment where e_id = '$e_id' ";
                            $run_es = mysqli_query($con, $es);

                            $e_seats = mysqli_fetch_assoc($run_es);
                            $evening_seats = implode($e_seats);
                            $evening_seats = $total_weight - $evening_seats;

                            echo "
                            
                            <table>
                                <tr style='border-bottom: 1px solid #4a4a4a; text-align:center;'>
                                    <th>Session Slot</th>
                                    <th>Total Seats</th>
                                    <th>Seats Available</th>
                                    <th>Enrollment</th>
                                </tr>
                                <tr>
                                    <form action='' method='post'>
                                    <td style='display:none;'><input type='text' name='e_id' value='$e_id'</td>
                                    <td style='display:none'><input type='text' name='session_id' value='1'</td>
                                    <td>Morning</td>
                                    <td>$total_weight</td>
                                    <td>$morning_seats</td>";

                                    if($morning_seats == 0) {
                                        echo "<td><span style='font-size: 16px; color: #ff4444;'>Closed</span><td>";
                                    }

                                    else {

                                    echo "
                                    <td><input type='submit' class='enroll_btn' name='enroll_Fitness Club Handling System' value='Enroll' /></td>";
                                    }

                                    echo "
                                    </form>
                                </tr>
                                <tr>
                                    <form action='' method='post'>
                                    <td style='display:none;'><input type='text' name='e_id' value='$e_id'</td>
                                    <td style='display:none'><input type='text' name='session_id' value='2'</td>
                                    <td>Evening</td>
                                    <td>$total_weight</td>
                                    <td>$evening_seats</td>";

                                    if($evening_seats == 0) {
                                        echo "<td><span style='font-size: 16px; color: #ff4444;'>Closed</span><td>";
                                    }

                                    else {

                                    echo "
                                    <td><input type='submit' class='enroll_btn' name='enroll_Fitness Club Handling System' value='Enroll' /></td>";
                                    }

                                    echo "
                                    </form>
                                </tr>
                            </table>

                            
                            ";
                        }

                        else if($session_id = 1) {
                            $as = "SELECT COUNT(*) FROM enrollment where e_id = '$e_id' AND session_id = '1'";
                            $run_as = mysqli_query($con, $as);
                            
                            $m_seats = mysqli_fetch_assoc($run_as);
                            $morning_seats = implode($m_seats);
                            $morning_seats = $total_weight - $morning_seats;

                            echo "
                            
                            <table>
                                <tr style='border-bottom: 1px solid #4a4a4a; text-align:center;'>
                                    <th>Session Slot</th>
                                    <th>Total Seats</th>
                                    <th>Seats Available</th>
                                    <th>Enrollment</th>
                                </tr>
                                <tr>
                                    <form action='' method='post'>
                                    <td style='display:none;'><input type='text' name='e_id' value='$e_id'</td>
                                    <td style='display:none'><input type='text' name='session_id' value='1'</td>
                                    <td>Morning</td>
                                    <td>$total_weight</td>
                                    <td>$morning_seats</td>";

                                    if($morning_seats == 0) {
                                        echo "<td><span style='font-size: 16px; color: #ff4444;'>Closed</span><td>";
                                    }

                                    else {

                                    echo "
                                    <td><input type='submit' class='enroll_btn' name='enroll_Fitness Club Handling System' value='Enroll' /></td>";
                                    }

                                    echo "
                                    </form>
                                </tr>
                            </table>
                            
                            ";
                        }      
                        
                        else {
                            $es = "SELECT COUNT(*) FROM enrollment where e_id = '$e_id' AND session_id = '2'";
                            $run_es = mysqli_query($con, $es);

                            $e_seats = mysqli_fetch_assoc($run_es);
                            $evening_seats = implode($e_seats);
                            $evening_seats = $total_weight - $evening_seats;

                            
                            echo "
                            
                            <table>
                                <tr style='border-bottom: 1px solid #4a4a4a; text-align:center;'>
                                    <th>Session Slot</th>
                                    <th>Total Seats</th>
                                    <th>Seats Available</th>
                                    <th>Enrollment</th>
                                </tr>
                                <tr>
                                    <form action='' method='post'>
                                    <td style='display:none;'><input type='text' name='e_id' value='$e_id'</td>
                                    <td style='display:none'><input type='text' name='session_id' value='2'</td>
                                    <td>Evening</td>
                                    <td>$total_weight</td>
                                    <td>$evening_seats</td>";

                                    if($evening_seats == 0) {
                                        echo "<td><span style='font-size: 16px; color: #ff4444;'>Closed</span><td>";
                                    }

                                    else {

                                    echo "
                                    <td><input type='submit' class='enroll_btn' name='enroll_Fitness Club Handling System' value='Enroll' /></td>";
                                    }

                                    echo "
                                    </form>
                                </tr>
                            </table>

                            
                            ";
                            
                        }
                       
            echo "            
                </div>
                <div class='modal-footer'>
                    <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Close</a>
                </div>
            </div>
            
            ";
        
        }
        ?>
        </div>

        <div class="footer">
            copyright &copy; 2022 |
            <a href="adminpanel/index.php" target="_blank" style="font-size: 14px; color: #fff;">Admin</a>
        </div>
        
    </div>


    <script src="js/jQuery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>

</body>
</html>


<?php 

if(isset($_POST['enroll_Fitness Club Handling System']))

    {
    
    
    $e_id = $_POST['e_id'];
    $session_id = $_POST['session_id'];

    $check = "SELECT * FROM enrollment where session_id = '$session_id' AND student_id = '$current_student_id' AND e_id = '$e_id'";
    $run_check = mysqli_query($con, $check);

    $check_enrollment = mysqli_fetch_assoc($run_check);
    $ce = $check_enrollment['e_id'];
    $sid = $check_enrollment['session_id'];
    $student_id = $check_enrollment['student_id'];

    if($ce == $e_id && $sid == $session_id && $student_id = $current_student_id) {
        echo "<script>window.alert('Already Enrolled')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
        exit();
    }

    else {

    $enroll = "INSERT into enrollment (student_id, e_id, session_id) VALUES ('$current_student_id', '$e_id', '$session_id')";
    $run_enroll = mysqli_query($con, $enroll);

    echo "<script>window.alert('Enrolled Successfully')</script>";
    echo "<script>window.open('my_account.php', '_self')</script>";
    }


    }


?>