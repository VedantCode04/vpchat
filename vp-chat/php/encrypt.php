<?php 

function encrypt($str){
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "vedant208";

    return
    openssl_encrypt(
        $str,
        $ciphering,
        $encryption_key,
        $options,
        $encryption_iv
    );
}

?>