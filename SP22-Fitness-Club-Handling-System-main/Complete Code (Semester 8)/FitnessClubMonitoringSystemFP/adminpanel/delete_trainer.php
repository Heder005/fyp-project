<?php 

include("../db/connection.php");

if(isset($_GET['delete_trainer'])) {
    
    $delete_id = $_GET['delete_trainer'];

    $delete_inst = "delete from trainers where trainer_id = '$delete_id'";

    $run_delete_inst = mysqli_query($con, $delete_inst);

    if($run_delete_inst) {
        echo "<script>window.alert('Trainer Info Deleted')</script>";
        echo "<script>window.open('adminarea.php?view_trainers', '_self')</script>";
    }
}


?>