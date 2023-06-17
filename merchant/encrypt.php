<?php
function encrypt_decrypt($action, $string)
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = '360D8205B697AD4E78E5C76A244EE333A82C0FB395EF1B791EDA1891A156739A5F265F64540156CAD45B207CCA55F9E99F2B845385C27B86D7C7CC12F50B5221';
    $secret_iv = 'C03349DA763C850153B271F5E685F15FA4E5467E579F9CA4A02E912AEE42411E8E1BCDC6BF0CA6DCEB40EE383D91B0BCD80914EA91DAFDE063B8270FC751DE95';
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ($action == 'encrypt') {
        $enc_string = md5($string);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $output = openssl_encrypt($enc_string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}
// echo encrypt_decrypt('encrypt','admin');
//echo encrypt_decrypt('decrypt','admin');
?>