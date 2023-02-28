<?php 

// if(!isset($_SESSION['username'])) {
//     echo "<script>window.open('index.php', '_self')</script>";
// }

?>


<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
        <h4 class="center heading" style="margin-top: 0px;">Add New Gym Equipments </h4>
        <form action="adminarea.php?add_equipments" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Equipments Name</td>
                    <td><input type="text" name="equipment_name" required></td>
                </tr>
                <tr>
                    <td>Equipments Image</td>
                    <td><input type="file" name="equipment_image" required></td>
                </tr>   
                <tr>
                    <td>Total Weight</td>
                    <td><input type="text" name="total_weight" onkeypress="return isNumber(event)" required></td>
                </tr>
              
                <tr>
                    <td>Equipments Price</td>
                    <td><input type="text" name="equipment_price" onkeypress="return isNumber(event)" required></td>
                </tr>
                <tr>
                    <td>Equipments Details</td>
                    <td><input type="text" name="equipment_details" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="add_equipments" value="Add Equipments Now">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['add_equipments'])) {

        // Getting text inputs
        $equipment_name = $_POST['equipment_name'];
        $total_weight = $_POST['total_weight'];      
        $equipment_price = $_POST['equipment_price'];
        $equipment_details = $_POST['equipment_details'];
        // Getting image from the field
        $equipment_image = $_FILES['equipment_image'] ['name'];
        $equipment_image_tmp = $_FILES['equipment_image'] ['tmp_name'];

        // Moving file into other folder
        move_uploaded_file($equipment_image_tmp, "equipments/$equipment_image");

        $add_equipments = "insert into equipments (  equipment_name, equipment_image,total_weight,equipment_price, equipment_details ) values ('$equipment_name', '$equipment_image','$total_weight','$equipment_price',  '$equipment_details')";

        $insert_c = mysqli_query($con, $add_equipments); 

        if($insert_c) {
            echo "<script>window.alert('Equipment has been inserted')</script>";
            echo "<script>window.open('adminarea.php?add_equipments', '_self')</script>";
        }
    }

?>