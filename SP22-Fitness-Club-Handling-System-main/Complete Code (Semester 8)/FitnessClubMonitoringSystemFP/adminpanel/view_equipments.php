<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>
<button onClick="window.print()">Print Record</button>
<div class="row view_table">
    <div class="col 12 m12 l12" style="padding: 0 !important">
        <h4 class="center heading" style="margin-top: 0px;">All Equipments Info</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>               
                <th>Total Weight</th>
                <th>Equipment Price</th>
                <th>Equipment Detail</th>
                <!-- <th>Edit</th>
                <th>Delete</th> -->
            </tr>
            <?php 

                $get_trainers = "SELECT * FROM equipments";
                $run_trainers = mysqli_query($con, $get_trainers);
                
                while($row_trainers = mysqli_fetch_array($run_trainers)) {
                    
                    $trainer_id = $row_trainers['e_id'];
                   
                    $equipment_name = $row_trainers['equipment_name'];
                    $equipment_image = $row_trainers['equipment_image'];
                    $total_weight = $row_trainers['total_weight'];
                    $equipment_price = $row_trainers['equipment_price'];
                    $equipment_details = $row_trainers['equipment_details'];
                    // $get_session = "select * from session where session_id = '$session_id'";
                    // $run_session = mysqli_query($con, $get_session);

                    // $row_session = mysqli_fetch_array($run_session);
                        
                    // $session_name = $row_session['session_name'];

            ?>
            <tr>
                <td><?php echo $trainer_id; ?></td>
                <td><?php echo $equipment_name ?></td>
                <td><img src="equipments/<?php echo $equipment_image ?>" style="width: 50px;"></td>
           
                <td><?php echo $total_weight ?></td>
                <td><?php echo $equipment_price ?></td>
                <td><?php echo $equipment_details ?></td>
                <!-- <td><a href="adminarea.php?edit_trainer=<?php echo $trainer_id ?>">Edit</a></td>
                <td><a href="delete_trainer.php?delete_trainer=<?php echo $trainer_id ?>">Delete</a></td> -->
            </tr>
            <?php } ?>
        </table>
    </div>
</div>