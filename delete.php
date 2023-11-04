<?php
session_start();
include "db/connect.php";
if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];
    $type_query = "DELETE FROM `participants` WHERE `participants`.`p_id` =$id";
    $run_query = mysqli_query($con, $type_query);
    if ($run_query) {
          header("location:admin.php");
    }
    
 
}



?>
