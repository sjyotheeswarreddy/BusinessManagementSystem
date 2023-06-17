<?php  
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['EMPLOYEE_LOGIN'])) {
    header("location:../employee_login.php");
}
 $userid = $_SESSION['EMPLOYEE_LOGIN'];
 $id = $_GET['id'];
 error_reporting(E_ERROR | E_PARSE); 

 date_default_timezone_set('Asia/Kolkata');
 $date = date("Y-m-d H:i:s");

 $sql1 = "SELECT * from attendance where id=".$id."";
 $result1 = mysqli_query($con, $sql1);
 $check=0;
 while($res = mysqli_fetch_array($result1)){
     if($status=='0'){
         $check=1;
         break;
     }
 }

if($check==0 and $id!=0){
$sql = "UPDATE attendance SET endtime='".$date."', status='0' where empid='$userid' and id='$id'";  
$result = mysqli_query($con, $sql); 
    
if($result) {   
    echo '<script type="text/javascript">';
    echo 'alert("Checked-out Successfully...");';
    echo "window.location.href='employee_index.php'";
    echo '</script>';
}
else { 
    echo '<script type="text/javascript">';
    echo 'alert("Failed to check-out...! Try again");';
    echo "window.location.href='employee_index.php'";
    echo '</script>';
}
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Already Checked-out...");';
    echo "window.location.href='employee_index.php'";
    echo '</script>';
}
?>