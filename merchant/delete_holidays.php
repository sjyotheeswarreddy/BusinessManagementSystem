<?php
session_start();
require_once("config.php");
if (!isset($_SESSION['id'])) {
   // header("location:../admin_login.php");
}

//require("config.php");
//if($_GET['GST_Number'] == ''){
  //  header("Location: view_users.php");
//}else{

    $sno = $_GET['id'];
    $delete = mysqli_query($con, "DELETE FROM holidays WHERE id='$sno'");
    if ($delete) {
        echo '<script type="text/javascript">';
         echo 'alert("Deleted Successfully");';
        echo 'window.location.href="holidays_view.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Failed to Delete");';
        echo 'window.location.href="holidays_view.php";';
        echo '</script>';
    }
?>