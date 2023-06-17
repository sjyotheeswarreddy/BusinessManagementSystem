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

$mysql = "SELECT merchant_id from employeedetails where empid='".$userid."'";  
$myresult = mysqli_query($con, $mysql); 
$merid = 0;
while($myres = mysqli_fetch_array($myresult)){
    $merid = $myres['merchant_id'];
}

$sql1 = "SELECT * from attendance where empid='".$userid."'";
$result1 = mysqli_query($con, $sql1);
$check=0;
while($res = mysqli_fetch_array($result1)){
    $mystart = $res['starttime'];
    $orgdate = $date.'';
    if(explode(" ", $mystart)[0]==explode(" ", $date)[0]){
        $check=1;
        break;
    }
}
if($check==0){
$sql = "INSERT INTO attendance(merchant_id, empid, starttime, endtime, status) VALUES(".$merid.", '".$userid."', '".$date."', '', 'a');";  
$result = mysqli_query($con, $sql); 
    
if($result) {   
    echo '<script type="text/javascript">';
    echo 'alert("Checked-in Successfully...");';
    echo "window.location.href='employee_index.php'";
    echo '</script>';
}
else { 
    echo '<script type="text/javascript">';
    echo 'alert("Failed to check-in...! Try again");';
    echo "window.location.href='employee_index.php'";
    echo '</script>';
}
}
else{
    echo '<script type="text/javascript">';
    echo 'alert("Already Checked-in...");';
    echo "window.location.href='employee_index.php'";
    echo '</script>';
}
?>