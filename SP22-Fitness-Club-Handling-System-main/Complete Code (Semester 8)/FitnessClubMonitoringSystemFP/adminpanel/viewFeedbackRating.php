<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>
<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">All Users Feedback Rating</h4>
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

                $get_trainers = "SELECT * FROM feedback order by c_trainer asc";
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