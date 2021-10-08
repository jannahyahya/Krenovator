<?php
function encrypt($string)
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = "I'm a barbie gurl, in a barbie worldd"; // user define private key
    $secret_iv = "life in plastic, its fantastic"; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
	$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	$output = base64_encode($output);
    return $output;
}
?>