<?php

const CIPHER ='aes-256-gcm';

function encrypter($value, $variable = true){

    if (is_null($value)){
        return $value;
    }

    $keyPrivate = keyPrivate();
    $key = substr($keyPrivate, 256, 32);
    $iv = substr($keyPrivate, 128, $ivlen = openssl_cipher_iv_length(CIPHER));
    $tag = '';

    if ($variable)
        $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext_raw = openssl_encrypt($value, CIPHER, $key, 0, $iv, $tag, 'agp');

    return base64_encode( $iv.$tag.$ciphertext_raw );
}

function decryptor($value){

    if (is_null($value)){
        return $value;
    }

    $keyPrivate = keyPrivate();
    $key = substr($keyPrivate, 256, 32);
    $c = base64_decode($value);
    $iv = substr($c, 0, $ivlen = openssl_cipher_iv_length(CIPHER));
    $tag = substr($c, $ivlen, $taglen = 16);
    $ciphertext_raw = substr($c, $ivlen+$taglen);

    $originaltext = openssl_decrypt($ciphertext_raw, CIPHER, $key, 0, $iv, $tag, 'agp');

    return $originaltext;
}

function keyPrivate(){

    $value = \Config::get('config.key_private');
    if (file_exists($value) == null) {
        throw new \Exception('Falha ao carregar private_key para token');
    } else {
        $fp = fopen($value, 'r');
        $key = fread($fp, filesize($value));
        fclose($fp);
    }
    return $key;
}
