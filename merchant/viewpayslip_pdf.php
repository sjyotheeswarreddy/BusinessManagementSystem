<?php
session_start();
require('vendor/autoload.php');
error_reporting(0);
require('config.php');
$id = $_GET['id'];
$mode = $_GET['mode'];

if (!isset($_SESSION['MERCHANT_LOGIN']) and !isset($_SESSION['EMPLOYEE_LOGIN'])) {
    //header("location:../merchant_login.php");
}

if(isset($_SESSION['EMPLOYEE_LOGIN'])){
    $tempsql = mysqli_query($con, "SELECT * FROM payslip WHERE empid='$id'");
    $tempid='';
    while ($tempdata = mysqli_fetch_array($tempsql)) {
        $tempid=$tempdata['empid'];
        if($tempid!=$_SESSION['EMPLOYEE_LOGIN']){
            //header("location:../employee_login.php");
        }
    }
}

$userid = $_SESSION['MERCHANT_LOGIN'];
$sql = mysqli_query($con, "SELECT * FROM merchant WHERE id='$userid'");
while ($data = mysqli_fetch_array($sql)) {
    $username = $data['businessname'];
    $image=$data['myfile'];
    $manid = $data['id'];
    $address = $data['Address'];
}


$mysql = mysqli_query($con, "SELECT * FROM payslip WHERE empid='$id'");

while ($myrow = mysqli_fetch_array($mysql)) {
    $empid=$myrow['empid'];
    $month=$myrow['month'];
    $sal=$myrow['salary'];
}

$sql2 = mysqli_query($con, "SELECT * FROM employeedetails WHERE merchant_id='$userid' and empid='$id';");
$empname = '';
$des = '';
while ($row1 = mysqli_fetch_array($sql2)) {
    $empname = $row1['empname'];
    $des = $row1['emprole'];
    $date=$row1['dateof'];
}

$html = 
'<head>
<style>
hr{
    width:100%;
    height:30px;
    color:#000066;
}
</style>
</head>
<body>
<div class="container">
    <header id="main_header_area" class="">
    <table class="header" style="width:100%;">
        <tbody>
            <tr>
                <th rowspan="3" align="left"><img src="'.$image.'" height="50px" width="60px"></th>
            </tr>
            <tr>
                <th align="left">'.$username.'</th>
            </tr>
            <tr>
                <th align="left">'.$address.'</th>
            </tr>
        </tbody>
    </table>
    </header>
    <hr />
    <div width=100% style="border-bottom:1px solid black;">
    <h3 align="center">Pay Slip for the Month of '.getmonth($month).' '.explode('-',$month)[0].'</h3>
    <table width="100%" style="border: 1px solid black; border-collapse: collapse;">
        <tbody>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;">Name</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$empname.'</td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;">Employee Id</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$empid.'</td>
            </tr>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;">Designation</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$des.'</td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;">Date of Joining</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: center;">'.$date.'</td>
            </tr>
            <tr bgcolor="#000066">
                <td width="20%" style="border: 1px solid black; border-collapse: collapse; color:white; text-align:center;"><b>Earnings</b></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: center; color: white;"><b>Amount in INR</b></td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse; text-align: center; color: white;"><b>Deductions</b></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: center; color: white;"><b>Amount in INR</b></td>
            </tr>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Base Pay</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>'.$sal.'</i></td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Provident Fund</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>'.(12*$sal/100).'</i></td>
            </tr>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>House Rent Allowance</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>0</i></td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>ESI</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>'.(0.75*$sal/100).'</i></td>
            </tr>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Conveyance</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>0</i></td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Professional Tax</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>'.getpt($sal).'</i></td>
            </tr>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Special Allowance</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>0</i></td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Loss of Pay</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>0</i></td>
            </tr>
            <tr>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Total Exchange</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>'.($sal-(12*$sal/100)-(0.75*$sal/100)-getpt($sal)).'</i></td>
                <td width="20%" style="border: 1px solid black; border-collapse: collapse;"><i>Total Deductions</i></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse; text-align: right;"><i>'.((12*$sal/100)+(0.75*$sal/100)+getpt($sal)).'</i></td>
            </tr>
            <tr>
                <td width="100%" colspan="4" style="text-align: center;"><i>Net Pay: '.($sal-(12*$sal/100)-(0.75*$sal/100)-getpt($sal)).' ('.getwords(($sal-(12*$sal/100)-(0.75*$sal/100)-getpt($sal))).' Rupees Only)</i></td>
            </tr>
        </tbody>
    </table>
    </div>
    <p style="text-align: center;">This is computer generated Pay-Slip and does not require any signatures.</p>
</div>
</body>';

if($mode=="view"){
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file='payslip/'.time().'.pdf';
    $mpdf->output($file,'I'); //D, I, F, S
}
elseif($mode="download"){
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file='payslip/'.time().'.pdf';
    $mpdf->output($file,'D'); //D, I, F, S
}
// echo $html;

function getwords(float $amount){
    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
      3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
      7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
      10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
      13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
      16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
      19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
      40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
      70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
     $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
     while( $x < $count_length ) {
       $get_divider = ($x == 2) ? 10 : 100;
       $amount = floor($num % $get_divider);
       $num = floor($num / $get_divider);
       $x += $get_divider == 10 ? 1 : 2;
       if ($amount) {
        $add_plural = (($counter = count($string)) && $amount > 9) ? '' : null;
        $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
        $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
        '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
        '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
         }
    else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
    " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees . ' ' : '') . $get_paise;
 }

 function getmonth(string $value) {
    $change_words = array(0 => '', 1 => 'January', 2 => 'February',
    3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June',
    7 => 'July', 8 => 'August', 9 => 'September',
    10 => 'October', 11 => 'November', 12 => 'December');
    $string = explode("-",$value);

    return $change_words[intval($string[1])];
 }

 function getpt(int $value){
     $res=0;
     if($value<=15000){
        $res=0;
     }
     elseif($value>15000&&$value<=20000){
        $res=150;
     }
     else{
         $res=200;
     }
     return $res;
 }

?>