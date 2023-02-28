<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>

<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">All Trainers Info</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Session</th>
                <th>Total Seats</th>
                <th>Package Name</th>
                <th>Training Fee</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php 

                $get_trainers = "SELECT * FROM trainers";
                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['trainer_id'];
                    $session_id = $row_trainers['session_id'];
                    $trainer_name = $row_trainers['trainer_name'];
                    $trainer_image = $row_trainers['trainer_image'];
                    $total_seats = $row_trainers['total_seats'];
                    $package_name = $row_trainers['package_name'];
                    $training_fee = $row_trainers['training_fee'];
                    $get_session = "select * from session where session_id = '$session_id'";
                    $run_session = mysqli_query($con, $get_session);

                    $row_session = mysqli_fetch_array($run_session);
                    $session_name='';
                    if(isset($row_session))                        
                       $session_name = $row_session['session_name'];
                 
                    

            ?>
            <tr>
                <td><?php echo $trainer_id; ?></td>
                <td><?php echo $trainer_name ?></td>
                <td><img src="trainers/<?php echo $trainer_image ?>" style="width: 50px;"></td>
                <td><?php echo $session_name ?></td>
                <td><?php echo $total_seats ?></td>
                <td><?php echo $package_name ?></td>
                <td><?php echo $training_fee ?></td>
                <td><a href="adminarea.php?edit_trainer=<?php echo $trainer_id ?>">Edit</a></td>
                <td><a href="delete_trainer.php?delete_trainer=<?php echo $trainer_id ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>