<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['MERCHANT_LOGIN'])) {
    header("location:../merchant_login.php");
}
?>
<?php
include ('config.php');
$explode = explode(",", $_GET['id']);
$id = $explode[0];
$status = $explode[1];
date_default_timezone_set('Asia/Kolkata');
$getdate = date("y-m-d H:i:s");
$userid = $_SESSION['MERCHANT_LOGIN'];
 

if ($id=='') {
	header("location:quotation_view.php");
	
}elseif ($status== 'Accepted') {
  
  $query = mysqli_query($con, "UPDATE quotation SET status = 'Accepted', submitdate = '$getdate' WHERE quotation_id='$id' and user_id='$userid'");
  if ($query) {
    header("location:quotation_view.php");
        echo '<script type="text/javascript">';
        echo 'alert("Registered Successfully...");';
        echo "window.location.href='quotation_view.php";
        echo '</script>';
    } else {
      header("location:quotation_view.php");
        echo '<script type="text/javascript">';
        echo 'window.location.href="quotation_view.php";';
        echo '</script>';
    }
	
}elseif ($status== 'Rejected') {
  mysqli_query($con, "UPDATE quotation SET status = 'Rejected' WHERE quotation_id='$id' and user_id='$userid'");
  header("location:quotation_view.php");
  
}elseif ($status== 'Pending'){
mysqli_query($con, "UPDATE quotation SET status = 'Pending' WHERE quotation_id='$id' and user_id='$userid'");
  header("location:quotation_view.php");

}else{
	header("location:quotation_view.php");
    die();
}

?>