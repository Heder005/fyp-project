
<?php 

if(!isset($_SESSION['student_email'])) {
    echo "<script>window.open('index.php', '_self')</script>";
}

if(session_id()=='')
{
    session_start();
}
if (isset($_SESSION['student_email']))
{
    $s_email = "SELECT student_id FROM students where student_email = '$_SESSION[student_email]'";
    $run_s = mysqli_query($con, $s_email);

    $ss_email = mysqli_fetch_assoc($run_s);
    $current_student_id = $ss_email['student_id'];

    global $current_student_id;

}


?>

<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
    <h4 class="center heading" style="margin-top: 0px;">Reserve Gym Trainners </h4>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="my_courses">

                    <tr style='border-bottom: 1px solid #dbdbdb; background: #3a4664; color: #fff;'>
                        <th class='center'>Enrollment ID</th>
                        <th class='center'>Trainer Name</th>
                        <th class='center'>Session</th>
                        <th class='center'>Fee</th>
                        <th class='center' colspan="2">Action</th>
                    </tr>
                
                <?php 
                
                
                $get_pro = "select * from enrollment where student_id = '$current_student_id'";
                $run_pro = mysqli_query($con, $get_pro);
        
                while($row_pro = mysqli_fetch_array($run_pro)) {
        
                  $trainer_id = $row_pro['trainer_id'];
                  $enrollment_id = $row_pro['enrollment_id'];
                  $session_id = $row_pro['session_id'];

                  $get_course = "select * from trainers where trainer_id = '$trainer_id'";
                  $run_course = mysqli_query($con, $get_course);

                  $course_name = mysqli_fetch_assoc($run_course);
                  $trainer_name = $course_name['trainer_name'];

                  $package_name = $course_name['package_name'];
                  $training_fee = $course_name['training_fee'];
                // --------------------------------------------------


                  $get_session = "select * from session where session_id = '$session_id'";
                  $run_session = mysqli_query($con, $get_session);

                  $session_name = mysqli_fetch_assoc($run_session);
                  $s_name = $session_name['session_name'];

                    echo "
                    
                    <tr style='border-bottom: 1px solid #dbdbdb;'>
                        <td class='center'>$enrollment_id</td>
                        <td class='center'>$trainer_name</td>
                        <td class='center'>$s_name</td>
                        <td class='center'>$training_fee</td>
                        <td class='center'><a href='payment.php?enrollment_id=$enrollment_id&fee=$training_fee' style='font-size: 14px; color: #187500;'>Make Payment</a></td>
                        <td class='center'><a href='delete_reservation.php?enrollment_id=$enrollment_id' style='font-size: 14px; color: #187500;'>Cancel</a></td>
                        
                    </tr>
                    
                    ";
                }
            
                ?>

            </table>
        </form>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
    <h4 class="center heading" style="margin-top: 0px;">Reserve Gym Equipments </h4>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="my_courses">

                    <tr style='border-bottom: 1px solid #dbdbdb; background: #3a4664; color: #fff;'>
                        <th class='center'>ID</th>
                        <th class='center'>Name</th>
                      
                        <th class='center'>Weight</th>
                        <th class='center'>Details</th>
                        <th class='center' >Action</th>
                    </tr>
                
                <?php 
                
                $student_email='';
                if (isset($_SESSION["student_email"]))
                {
                    $student_email = $_SESSION["student_email"];
                }

                $get_pro = "select * from Equipments where user_name = '$student_email'";
                $run_pro = mysqli_query($con, $get_pro);
        
                while($row_pro = mysqli_fetch_array($run_pro)) {
        
                  $e_id = $row_pro['e_id'];
                  $equipment_name = $row_pro['equipment_name'];
                  $equipment_image = $row_pro['equipment_image'];
                  $total_weight = $row_pro['total_weight'];
                  $equipment_price = $row_pro['equipment_price'];
                  $equipment_details = $row_pro['equipment_details'];
                // --------------------------------------------------


                

                    echo "
                    
                    <tr style='border-bottom: 1px solid #dbdbdb;'>
                        <td class='center'>$e_id</td>
                        <td class='center'>$equipment_name</td>
                        <td class='center'>$total_weight</td>                        
                        <td class='center'>$equipment_details</td>
                        <td class='center'><a href='delete_reservation.php?e_id=$e_id' style='font-size: 14px; color: #187500;'>Cancel</a></td>
                        
                    </tr>
                    
                    ";
                }
            
                ?>

            </table>
        </form>
    </div>
</div>


    
