
<?php 

if(!isset($_SESSION['student_email'])) {
    echo "<script>window.open('index.php', '_self')</script>";
}

?>

<div class="row">
    <div class="col l12 s12 m12 add_product" style="padding: 0 !important;">
       <h3 class='center' style='font-family: Cinzel, sans-serif'>Welcome</h3>
       <h5 class='center' style='sans-serif'><?php echo $_SESSION['student_email'] ?></h5>
    </div>
</div>
    
