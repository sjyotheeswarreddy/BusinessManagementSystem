<?php
session_start();
require_once("config.php");
require('vendor/autoload.php');
error_reporting(0);
$id = $_GET['id'];
$mode = $_GET['mode'];

if (!isset($_SESSION['MERCHANT_LOGIN'])) {
    header("location:../merchant_login.php");
}

$userid = $_SESSION['MERCHANT_LOGIN'];


$sql = mysqli_query($con, "SELECT * FROM merchant WHERE id='$userid'");
while ($data = mysqli_fetch_array($sql)) {
    $username = $data['businessname'];
    $image=$data['myfile'];
    $manid = $data['id'];
    $address = $data['Address'];
}

$mysql1 = mysqli_query($con, "SELECT * FROM invoice WHERE id=".$id."");
$getdate='';
$qid1=0;
while ($myrow1 = mysqli_fetch_array($mysql1)) {
    $getdate = $myrow1["datesubmit"];
    $qid1 = $myrow1["quotation_id"];
    $innum=$myrow1["id"];
}


$mysqlt = mysqli_query($con, "SELECT * FROM quotation WHERE quotation_id=".$qid1."");
while ($myrowt = mysqli_fetch_array($mysqlt)) {
    $cusname = $myrowt["customername"];
    $cusadd = $myrowt["customeraddress"];
}

// $sql2 = mysqli_query($conn, "SELECT * FROM productdetails WHERE businessname='".$username."' and productname='".$prodname."';");
// while ($row1 = mysqli_fetch_array($sql2)) {
//     $prodprice = $row1["productprice"];
//     $prodgst = $row1["GST"];
// }

$html = 
'<head>
<style>
th {
    color:white;
}
</style>
</head>
<body>
<h2 align="center">Tax Invoice</h2>
<div class="container" style="border: 2px solid black;">
    <header id="main_header_area" class="">
    <table class="header" style="width:100%; border-bottom: 1px solid black;">
        <tbody>
            <tr>
                <th rowspan="3" align="left"><img src="'.$image.'" height="50px" width="60px"></th>
            </tr>
            <tr>
                <th align="right">'.$username.'</th>
            </tr>
            <tr>
                <th align="right">'.$address.'</th>
            </tr>
        </tbody>
    </table>
    </header>
    <div width=100% style="border-bottom:1px solid black;">
    <div width="49%" style="border-right:1px solid black; float:left;">
    <table class="header">
        <tbody>
            <tr bgcolor="purple">
                <th align="left">Bill To:</th>
            </tr>
            <tr>
                <td align="left">'.$cusname.'</td>
            </tr>
            <tr>
                <td align="left">'.$cusadd.'</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div width="49%" style="float:right;">
    <table class="header" align="right">
        <tbody>
            <tr>
                <td align="right"><b>Invoice No.: Inv'.$innum.'</b></td>
            </tr>
            <tr>
                <td align="right">Date: '.$getdate.'</td>
            </tr>
            <tr>
                <td align="right">PO date: '.$getdate.'</td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>
    <div width="100%">
    <table width="100%" cellspacing="10" style="border: 1px solid black; border-collapse: collapse; text-align: center;">
        <tbody>
            <tr bgcolor="purple">
                <th width="10%" style="border: 1px solid black; border-collapse: collapse;">#</th>
                <th width="30%" style="border: 1px solid black; border-collapse: collapse;">Item name</th>
                <th width="30%" style="border: 1px solid black; border-collapse: collapse;">Quantity</th>
                <th width="20%" style="border: 1px solid black; border-collapse: collapse;">Price/ Unit</th>
                <th width="20%" style="border: 1px solid black; border-collapse: collapse;">GST</th>
                <th width="20%" style="border: 1px solid black; border-collapse: collapse;">Amount</th>
            </tr>';
            $sql1 = mysqli_query($con, "SELECT * FROM invoice WHERE id=".$id."");
            $paymode='';
            $advpay=0;
            $remamt=0;
            $qid=0;
            while ($row = mysqli_fetch_array($sql1)) {
                $qid = $row["quotation_id"];
                $paymode = $row["mode"];
                $advpay = $row["amountpaid"];
                $remamt = $row["remainingamt"];
            }
            $mysql = mysqli_query($con, "SELECT * FROM quotation WHERE quotation_id=".$qid."");
            $i=0;
            $totalgst = 0;
            $quty = 0;
            $amt = 0;
            $gstper = 0;
            while ($myrow = mysqli_fetch_array($mysql)) {
                $i+=1;
                $mygst = $myrow["grandtotal"]-$myrow["productprice"]*$myrow["quantity"];
                
            $html.='<tr>
                <td width="10%" style="border-right: 1px solid black; border-collapse: collapse;">'.$i.'</td>
                <td width="30%" style="border-right: 1px solid black; border-collapse: collapse;">'.$myrow["product"].'</td>
                <td width="10%" style="border-right: 1px solid black; border-collapse: collapse;">'.$myrow["quantity"].'</td>
                <td width="30%" style="border-right: 1px solid black; border-collapse: collapse;">Rs '.$myrow["productprice"].'</td>
                <td width="30%" style="border-right: 1px solid black; border-collapse: collapse;">Rs '.$mygst.'('.$myrow["productgst"].'%)</td>
                <td width="30%" style="border-right: 1px solid black; border-collapse: collapse;">Rs '.$myrow["grandtotal"].'</td>
            </tr>';
            $totalgst+=$mygst;
            $quty+=$myrow["quantity"];
            $amt+=$myrow["grandtotal"];
            $gstper = $myrow["productgst"];
            }
            $halfgst = $totalgst/2;
            $withoutgst = $amt - $totalgst;
            $halfgstper = $gstper/2;
            $html.='<tr>
                <td width="10%" style="border: 1px solid black; border-collapse: collapse;"></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse;">Total</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse;">'.$quty.'</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse;"></td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse;">Rs '.$totalgst.'</td>
                <td width="30%" style="border: 1px solid black; border-collapse: collapse;">Rs '.$amt.'</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div width=100% style="border-bottom:1px solid black;">
    <div width="49%" style="border-right:1px solid black; float:left;">
    <table class="header">
        <tbody>
            <tr bgcolor="purple">
                <th align="center">Invoice Amount In Words</th>
            </tr>
            <tr>
                <td align="center">'.getwords($amt).' Rupees Only</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div width="49%" style="float:right;">
    <table class="header">
        <tbody>
            <tr bgcolor="purple">
                <th align="left">Amounts</th>
            </tr>
            <tr>
                <td align="left">Sub Total: Rs '.($amt).'</td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>
    <div width=100% style="border-bottom:1px solid black;">
    <div width="49%" style="border-right:1px solid black; float:left;">
    <table class="header" align="center">
        <tbody>
            <tr bgcolor="purple">
                <th>Payment Mode</th>
            </tr>
            <tr>
                <td align="center">'.$paymode.'</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    </div>
    <div width="49%" style="float:right;">
    <table class="header">
        <tbody>
            <tr>
                <td align="left"><b>Total </b></td>
                <td align="right">Rs '.$amt.'</b></td>
            </tr>
            <tr>
                <td align="left">Received </td>
                <td align="right">Rs '.$advpay.'</td>
            </tr>
            <tr>
                <td align="left">Balance </td>
                <td align="right">Rs '.$remamt.'</td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>
    <div width=100% style="border-bottom:1px solid black;">
    <div width="49%" style="border-right:1px solid black; float:left;">
    <table class="header" align="left">
        <tbody>
        <tr bgcolor="purple">
            <th width="20%">Tax Type</th>
            <th width="30%">Taxable amount</th>
            <th width="20%">Rate</th>
            <th width="30%">Tax amount</th>
        </tr>
        <tr>
            <td width="20%">SGST</td>
            <td width="30%" align="center">'.$withoutgst.'</td>
            <td width="20%" align="center">'.$halfgstper.'</td>
            <td width="30%" align="right">'.$halfgst.'</td>
        </tr>
        <tr>
            <td width="20%">CGST</td>
            <td width="30%" align="center">'.$withoutgst.'</td>
            <td width="20%" align="center">'.$halfgstper.'</td>
            <td width="30%" align="right">'.$halfgst.'</td>
        </tr>
        </tbody>
    </table>
    </div>
    <div width="49%" style="float:right;">
    </div>
    </div>
</div>
</body>';

if($mode=="view"){
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file='invoice/'.time().'.pdf';
    $mpdf->output($file,'I'); //D, I, F, S
}
elseif($mode="download"){
    $mpdf=new \Mpdf\Mpdf();
    $mpdf->WriteHTML($html);
    $file='invoice/'.time().'.pdf';
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
?>