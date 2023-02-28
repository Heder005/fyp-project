<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>
<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">All Users Info</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>               
                <!-- <th>Edit</th> -->
                <th>Delete</th>
            </tr>
            <?php 

                $get_trainers = "SELECT * FROM students";
                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['student_id'];
                    $session_id = $row_trainers['student_id'];
                    $student_name = $row_trainers['student_name'];
                    $student_email = $row_trainers['student_email'];
                    $type = $row_trainers['type'];

                    // $get_session = "select * from session where session_id = '$session_id'";
                    // $run_session = mysqli_query($con, $get_session);

                    // $row_session = mysqli_fetch_array($run_session);
                        
                    $session_name = $row_trainers['student_name'];

            ?>
            <tr>
                <td><?php echo $trainer_id; ?></td>
                <td><?php echo $student_name ?></td>
                <td><?php echo $student_email ?></td>
              
                <td><?php echo $type ?></td>
                <!-- <td><a href="adminarea.php?edit_trainer=<?php // echo $trainer_id ?>">Edit</a></td> -->
                <td><a href="deleteUser.php?deleteUser=<?php echo $trainer_id ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>