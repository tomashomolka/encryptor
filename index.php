<?php

if ($argc <= 1 || $argc > 3) {
	printf('Enter text to encrypt or ciphertext and password to decrypt. ' . PHP_EOL);

	return;
}

$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$iv = '1234567891011121';

if ($argc === 2) {
	$plainText = $argv[1];
	printf('Please type password for encrypt: ' . PHP_EOL);
	$password = stream_get_line(STDIN, 1024, PHP_EOL);

	$cipherText = openssl_encrypt($plainText, $ciphering, $password, $options, $iv);
	printf("Encrypted String: " . PHP_EOL);
	print_r($cipherText);
	printf(PHP_EOL);

	return;
}

if ($argc === 3) {
	$cipherText = $argv[1];
	$password = $argv[2];

	$plainText = openssl_decrypt($cipherText, $ciphering, $password, $options, $iv);
	echo "Decrypted String: " . PHP_EOL;
	print_r($plainText);
	printf(PHP_EOL);
}

