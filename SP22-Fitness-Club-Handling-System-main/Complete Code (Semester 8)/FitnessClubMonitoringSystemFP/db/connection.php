<?php

$con = mysqli_connect("localhost", "root", "", "fitnessclubmonitoringsystemfp");

if (mysqli_connect_errno()) {
    echo "Database Connection Not Established: " . mysqli_connect_error();
}

?>