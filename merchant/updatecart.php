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
//  $cusname = $_POST['cusname'];
//  $cusgst = $_POST['cusgst'];
//  $prodname = $_POST['prodname'];
//  $prodquantity = $_POST['prodquantity'];
//  $prodprice = $_POST['prodprice'];
$mysql = mysqli_query($con, "SELECT MAX(quotation_id)  FROM quotation");
while ($mydata = mysqli_fetch_array($mysql)) {
    $quotenum = $mydata['MAX(quotation_id)']+1;
}

$result=array(0);
$c=0;
if(isset($_POST["prodname"])){
    $number = count($_POST["prodname"]);  
 //echo "<script>console.log('".$_POST["prodname"][0]."');</script>";
 //echo "<script>console.log('".$number."');</script>";
 if($number > 0)  
 {  
    for($i=0; $i<$number; $i++)  
    {
        //$total = ($_POST["prodquantity"][$i])*($_POST["prodprice"][$i]);
        $sql = "INSERT INTO quotation(user_id, quotation_id, submitdate, customername, customergst, customeraddress, product, quantity, productgst, productprice, grandtotal, status) VALUES(".$user_id.", ".$quotenum.", '".$date."', '".mysqli_real_escape_string($con, $_POST["cusname"][$i])."', '".mysqli_real_escape_string($con, $_POST["cusgst"][$i])."', '".mysqli_real_escape_string($con, $_POST["cusaddress"][$i])."', '".mysqli_real_escape_string($con, $_POST["prodname"][$i])."', ".mysqli_real_escape_string($con, $_POST["prodquantity"][$i]).", ".mysqli_real_escape_string($con, $_POST["prodgst"][$i]).", ".mysqli_real_escape_string($con, $_POST["prodprice"][$i]).", ".mysqli_real_escape_string($con, $_POST["totalprice"][$i]).", 'Pending');";  
        if($_POST["prodname"][$i]!='--Select--' And $_POST["prodquantity"][$i]!=0){
            $result[$c] = mysqli_query($con, $sql); 
            //echo $c;
            $c=$c+1;
        }
        // if($result){

        // }
        // else{
        //     echo mysqli_error($con);
        // }
    }
    if(in_array(1, $result)) {   
        echo "quotation added Successfully...";  
    }
    else  
    {  
        //echo mysqli_error($con);
        if(!isset($_POST["prodname"])){
            echo "Failed to quotation...! Please add quotation";  
        }
    }  
 }  
 else  
 {   //echo mysqli_error($con);
      echo "Failed to quotation...! Please add quotation";  
 }  
}
if(isset($_POST["productname"])){
    //$total = ($_POST["productquantity"])*($_POST["productprice"]);
    $sql = "INSERT INTO quotation(user_id, quotation_id, submitdate, customername, customergst, customeraddress, product, quantity, productgst, productprice, grandtotal, status) VALUES(".$user_id.", ".$quotenum.", '".$date."', '".mysqli_real_escape_string($con, $_POST["customername"])."', '".mysqli_real_escape_string($con, $_POST["customergst"])."', '".mysqli_real_escape_string($con, $_POST["customeraddress"])."', '".mysqli_real_escape_string($con, $_POST["productname"])."', ".mysqli_real_escape_string($con, $_POST["productquantity"]).", ".mysqli_real_escape_string($con, $_POST["productgst"]).", ".mysqli_real_escape_string($con, $_POST["productprice"]).", ".mysqli_real_escape_string($con, $_POST["grandtotal"]).", 'Pending');";  
    if($_POST["productname"]!='--Select--' And $_POST["productquantity"]!=0) {   
        mysqli_query($con, $sql);
        if(!isset($_POST["prodname"])){
            echo "quotation  added Successfully...";  
        }
    }
    else  
    {  
        if(!isset($_POST["prodname"])){
        //echo mysqli_error($con);
            echo "Failed to quotation...! Please add quotation";
        }  
    } 
}
 ?> 