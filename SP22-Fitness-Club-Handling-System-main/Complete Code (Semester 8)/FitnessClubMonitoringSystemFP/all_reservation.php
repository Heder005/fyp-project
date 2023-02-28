
<?php 

if(!isset($_SESSION['student_email'])) {
    echo "<script>window.open('index.php', '_self')</script>";
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
        <form action="" method="post" enctype="multipart/form-data">
            <table class="my_courses">

                    <tr style='border-bottom: 1px solid #dbdbdb; background: #3a4664; color: #fff;'>
                        <th class='center'>Enrollment ID</th>
                        <th class='center'>Trainer Name</th>
                        <th class='center'>Session</th>
                    </tr>
                
                <?php 
                
                
                $get_pro = "select * from enrollment";
                $run_pro = mysqli_query($con, $get_pro);
        
                while($row_pro = mysqli_fetch_array($run_pro)) {
        
                  $trainer_id = $row_pro['trainer_id'];
                  $enrollment_id = $row_pro['enrollment_id'];
                  $session_id = $row_pro['session_id'];

                  $get_course = "select * from trainers where trainer_id = '$trainer_id'";
                  $run_course = mysqli_query($con, $get_course);

                  $course_name = mysqli_fetch_assoc($run_course);
                  $trainer_name = $course_name['trainer_name'];


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
                    </tr>
                    
                    ";
                }
            
                ?>

            </table>
        </form>
    </div>
</div>


    
