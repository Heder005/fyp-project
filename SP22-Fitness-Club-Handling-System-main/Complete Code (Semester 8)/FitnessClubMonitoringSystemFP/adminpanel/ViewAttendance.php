<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
   
// }



?>
<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">View Mark Attendance</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Date</th>      
                <th>Name</th>               
                <th>Status</th>   
                <th>Type</th>          
               
             
            </tr>
            <?php 

                $get_trainers = "select attendance.id,attendance.u_name,attendance.t_name,attendance.status,attendance.att_date ,students.type from attendance inner join students on students.student_name= attendance.u_name  order by att_date DESC";
                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['id'];
                    $session_id = $row_trainers['id'];
                    $type = $row_trainers['att_date'];
                    $student_name = $row_trainers['u_name'];
                    $status = $row_trainers['status'];
                    $student_email = $row_trainers['type'];
                  

                    // $get_session = "select * from session where session_id = '$session_id'";
                    // $run_session = mysqli_query($con, $get_session);

                    // $row_session = mysqli_fetch_array($run_session);
                        
                   // $session_name = $row_trainers['student_name'];

            ?>
            <tr>
                <td><?php echo $trainer_id; ?></td>
                <td><?php echo $type ?></td>          
                <td><?php echo $student_name ?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $student_email ?></td>
              
              
              
              
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

