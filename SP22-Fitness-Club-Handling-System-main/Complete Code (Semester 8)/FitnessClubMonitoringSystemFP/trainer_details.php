<?php

session_start();
include('db/connection.php');

if (isset($_SESSION['student_email'])) {
    $s_email = "SELECT student_id FROM students where student_email = '$_SESSION[student_email]'";
    $run_s = mysqli_query($con, $s_email);

    $ss_email = mysqli_fetch_assoc($run_s);
    $current_student_id = $ss_email['student_id'];

    global $current_student_id;
}

$t_id = $_GET['trainer_id']

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
                    <?php

                    if (isset($_SESSION['student_email'])) {
                        echo "<li><a href='my_account.php' class='waves-effect waves-light btn'>Profile</a></li>";
                        echo "<li><a href='logout.php' class='waves-effect waves-light btn'>Log Out</a></li>";
                    } else {
                        echo "<li><a href='register.php' class='waves-effect waves-light btn'>Login | Register</a></li>";
                    }
                    echo "<li><a href='adminpanel/index.php' class='waves-effect waves-light btn'>Admin</a></li>";
                    ?>
                </ul>
            </div>
        </nav>



        <div class="row">

            <?php


            // Display Course
            $get_pro = "select * from trainers where trainer_id = '$t_id'";
            $run_pro = mysqli_query($con, $get_pro);

            while ($row_pro = mysqli_fetch_array($run_pro)) {

                $trainer_id = $row_pro['trainer_id'];
                $trainer_name = $row_pro['trainer_name'];

                $_SESSION['Trainer_Name'] = $trainer_name;
                $trainer_image = $row_pro['trainer_image'];
                $trainer_details = $row_pro['trainer_details'];

                echo "
                <div class='col l12 m12 s12 course_grid z-depth-2 center' style='margin-top: 10px;'>
                    <a href='trainer_details.php?trainer_id=$trainer_id'><img src='adminpanel/trainers/$trainer_image' alt='Table' style='height: 360px; width: 300px !important;'></a>
                    
                    <table>
                    
                        <tr>
                            <td style='width: 200px;'>Trainer Name</td>
                            <td><span class='name z-depth-1' style='color: #0d0d0d; background: #fff;'>$trainer_name</span></td>
                        </tr>
                        <tr>
                            <td>Trainer Details</td>
                            <td><span class='name z-depth-1' style='font-weight: 400; padding: 5px 20px; font-size: 14px; color: #0d0d0d; background: #fff;'>$trainer_details</span></td>
                        </tr>

                        
                    </table>
                    <form>
                    <input type='button' value='Go Back' onClick='javascript:history.go(-1)' style='width: 150px; height: 30px; background: #181818; color: #fff; border: none; float: right;'/>
                </form>
                </div>
                    ";
            }
            ?>
        </div>


        <div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">Feedback Rating</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Trainer</th>
                <th>User</th>
                <th>Name</th>
                <th>Email</th>
                <th>Review</th>               
                <th>Rate</th>
              
            </tr>
            <?php 


        $get_trainers = '';
        $TName='';
        if(isset($_SESSION['Trainer_Name']))
        {
            $TName = $_SESSION['Trainer_Name'];
            //$_SESSION['TName'] = $TName;
            $get_trainers = "SELECT * FROM feedback where c_trainer = '$TName' order by c_trainer asc";
         }
         else
         {
            $get_trainers = "SELECT * FROM feedback order by c_trainer asc";
         }

               
                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['id'];
                    $session_id = $row_trainers['id'];
                    $c_trainer = $row_trainers['c_trainer'];
                    $c_user = $row_trainers['c_user'];
                    $student_name = $row_trainers['c_name'];
                    $student_email = $row_trainers['c_email'];
                    $c_review = $row_trainers['c_review'];
                    $c_rate = $row_trainers['c_rate'];
                   
            

                    // $get_session = "select * from session where session_id = '$session_id'";
                    // $run_session = mysqli_query($con, $get_session);

                    // $row_session = mysqli_fetch_array($run_session);
                        
                  //  $session_name = $row_trainers['student_name'];

            ?>
            <tr>
                <td><?php echo $trainer_id; ?></td>
                <td><?php echo $c_trainer ?></td>
                <td><?php echo $c_user ?></td>
                <td><?php echo $student_name ?></td>
                <td><?php echo $student_email ?></td>              
                <td><?php echo $c_review ?></td>
                <td><?php echo $c_rate ?></td>
              
  
            </tr>
            <?php } ?>
        </table>
    </div>
</div>


        <!--**************************************************************** -->


        <div class="footer">
            copyright &copy; 2022 |
            <a href="adminpanel/index.php" target="_blank" style="font-size: 14px; color: #fff;">Fitness Club Handling System</a>
        </div>

    </div>


    <script src="js/jQuery.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.modal').modal();
        });
    </script>

</body>

</html>


<?php

if (isset($_POST['enroll_course'])) {

    $trainer_id = $_POST['trainer_id'];
    $course_total_fee = $_POST['course_total_fee'];
    $st_education = $_POST['education'];
    $st_contact = $_POST['contact'];
    $status = "pending";
    $reg_date = date("d-m-Y");

    $check = "SELECT * FROM enrollment where trainer_id = '$trainer_id' AND student_id = '$current_student_id'";
    $run_check = mysqli_query($con, $check);

    $check_enrollment = mysqli_fetch_assoc($run_check);
    $ce = $check_enrollment['trainer_id'];

    if ($ce == $trainer_id) {
        echo "<script>window.alert('Already Enrolled')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
        exit();
    } else {
        $enroll = "INSERT into enrollment (trainer_id, student_id, education, contact, register_date) VALUES ('$trainer_id', '$current_student_id', '$st_education', '$st_contact', '$reg_date')";
        $run_enroll = mysqli_query($con, $enroll);

        $fee = "INSERT into fee (trainer_id, student_id, fee, status) VALUES ('$trainer_id', '$current_student_id', '$course_total_fee', '$status')";
        $run_fee = mysqli_query($con, $fee);

        echo "<script>window.alert('Enrolled Successfully')</script>";
        echo "<script>window.open('my_account.php', '_self')</script>";
    }
}

?>