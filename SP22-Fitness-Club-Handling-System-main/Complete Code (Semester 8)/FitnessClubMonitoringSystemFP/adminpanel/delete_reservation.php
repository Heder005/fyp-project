<?php 

include("../db/connection.php");

if(isset($_GET['enrollment_id'])) {
    
    $delete_id = $_GET['enrollment_id'];

    $delete_reservation = "delete from enrollment where enrollment_id = '$delete_id'";

    $run_delete_reservation = mysqli_query($con, $delete_reservation);

    if($run_delete_reservation) {
        echo "<script>window.alert('Reservation Cancelled Successfully')</script>";
        echo "<script>window.open('adminarea.php?all_reservations', '_self')</script>";
    }
}

if(isset($_GET['enr_id'])) {
    
    $delete_id = $_GET['enr_id'];

    $delete_reservation = "update enrollment set status='Accepted' where enrollment_id = '$delete_id'";

    $run_delete_reservation = mysqli_query($con, $delete_reservation);

    if($run_delete_reservation) {
        echo "<script>window.alert('Reservation Accepted Successfully')</script>";
        echo "<script>window.open('adminarea.php?all_reservations', '_self')</script>";
    }
}



?>