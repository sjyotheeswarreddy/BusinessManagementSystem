<?php
error_reporting(0);
require_once("config.php");
//if (!isset($_SESSION['MERCHANT_LOGIN'])) {
   // header("location:../merchant_login.php");
//}
?>
<?php
require_once("config.php");
 $explode = explode(",", $_GET['id']);

$id = $explode[0];
$status = $explode[1];
date_default_timezone_set('Asia/Kolkata');
//$getdate = date("y-m-d H:i:s");
//$userid = $_SESSION['MERCHANT_LOGIN'];
 

if ($id=='') {
	header("location:view_ticket.php");
	
}elseif ($status== 'Completed') {

  $query = mysqli_query($con, "UPDATE addsupport SET status ='Completed' WHERE id='$id'");
  if ($query) {
    header("location:view_ticket.php");
        echo '<script type="text/javascript">';
        //echo 'alert("Registered Successfully...");';
        echo "window.location.href='view_ticket.php";
        echo '</script>';
    } else {
      header("location:supportview.php");
        echo '<script type="text/javascript">';
        echo 'window.location.href="view_ticket.php";';
        echo '</script>';
    }
	
}elseif ($status== 'Pending'){

mysqli_query($con, "UPDATE addsupport SET status = 'Pending' WHERE id='$id' ");
  header("location:view_ticket.php");

}else{
	header("location:view_ticket.php");
    die();
}

?>


