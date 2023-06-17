<?php  
session_start();
 require_once("config.php");
 $userid = $_SESSION['MERCHANT_LOGIN'];
 error_reporting(E_ERROR | E_PARSE); 

 $sql = mysqli_query($con, "SELECT * FROM merchant WHERE id='$userid'");
 while ($data = mysqli_fetch_array($sql)) {
    $username = $data['businessname'];
    $image=$data['myfile'];
    $manid = $data['id'];
 }
 $user_id = $manid;
 $date = date("y-m-d H:i:s");

 $quoteid=$_POST['quoteid'];
  $sql1 = mysqli_query($con, "SELECT * FROM quotation WHERE user_id='$user_id' AND quotation_id='$quoteid'");
 while ($data1 = mysqli_fetch_array($sql1)) {
    $cusname = $data1['customername'];
 }
$payment_id=uniqid();
//  $prodname = $_POST['productname'];
//  $quoteamt = $_POST['quoteamt'];
//  $cusname = $_POST['cusname'];
//  $advamt = $_POST['advamt'];
//  $remamt = $_POST['remamt'];
//  $mode = $_POST['mode'];

//  echo $_POST['productname'];

$sql = "INSERT INTO invoice(user_id, quotation_id, datesubmit, customername, grandtotal, amountpaid, remainingamt, mode) VALUES(".$user_id.", ".$_POST['quoteid'].", '".$date."', '".$cusname."', ".mysqli_real_escape_string($con, $_POST["quoteamt"]).", '".mysqli_real_escape_string($con, $_POST["advamt"])."', ".mysqli_real_escape_string($con, $_POST["remamt"]).", '".mysqli_real_escape_string($con, $_POST["mode"])."');";  
$result = mysqli_query($con, $sql);


$sql1 = "INSERT INTO paymenthistory(user_id, paymentid,customername, paymentdate, paymentmode,amount) VALUES(".$user_id.", '".$payment_id."','".$cusname."', '".$date."','".mysqli_real_escape_string($con, $_POST["mode"])."', '".mysqli_real_escape_string($con, $_POST["advamt"])."');";  
$result1 = mysqli_query($con, $sql1);

    
if($result1 && $result) { 
  
    echo "Invoice created Successfully..."; 
}
else {  
    echo "Failed to create...! Try again";
  
}
?>