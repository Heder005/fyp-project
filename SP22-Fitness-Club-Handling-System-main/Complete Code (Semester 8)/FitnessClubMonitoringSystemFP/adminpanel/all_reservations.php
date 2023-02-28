<?php

// if(!isset($_SESSION['username']) ) {
 
//        echo "<script>window.open('index.php', '_self')</script>";
// }

?>
<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">All Reservations</h4>
        <table>
            <tr>
                <th class='center'>Enrollment ID</th>
                <th class='center'>Trainer Name</th>
                <th class='center'>Session</th>
               
                <th class='center'>Status</th>
                <th class='center' colspan="2">Action</th>
            </tr>
            <?php

           $uType='';
           $user_name='';
           if (isset($_SESSION['uType']))
           {
               $uType=$_SESSION['uType'];
           }
           
           if (isset($_SESSION['student_name']))
           {
               $user_name = $_SESSION['student_name'];
           }  
                
            $get_pro = "select * from enrollment";
               
            $run_pro = mysqli_query($con, $get_pro);

            while ($row_pro = mysqli_fetch_array($run_pro)) {

                $trainer_id = $row_pro['trainer_id'];
                $enrollment_id = $row_pro['enrollment_id'];
                $session_id = $row_pro['session_id'];
                $status = $row_pro['status'];

                $get_course ='';
                if($uType <> "Trainer")
                     $get_course = "select * from trainers where trainer_id = '$trainer_id'";
                 else
                     $get_course = "select * from trainers where trainer_id = '$trainer_id' and trainer_name = '$user_name'";
                
                 $run_course = mysqli_query($con, $get_course);

                $course_name = mysqli_fetch_assoc($run_course);

                $trainer_name ='';
                if (isset($course_name))
                   $trainer_name = $course_name['trainer_name'];
                 else
                   break ;
               

                // --------------------------------------------------


                $get_session = "select * from session where session_id = '$session_id'";
                $run_session = mysqli_query($con, $get_session);

                $session_name = mysqli_fetch_assoc($run_session);

                $s_name = $session_name['session_name'];

                echo "
    
    <tr>
        <td class='center'>$enrollment_id</td>
        <td class='center'>$trainer_name</td>
        <td class='center'>$s_name</td>
        <td class='center'>$status</td>
        
        <td class='center'><a href='delete_reservation.php?enr_id=$enrollment_id' style='font-size: 14px; color: #187500;'>Accept</a></td>
        <td class='center'><a href='delete_reservation.php?enrollment_id=$enrollment_id' style='font-size: 14px; color: #187500;'>Cancel</a></td>
    </tr>
    
    ";
            } ?>
        </table>
    </div>
</div>