<?php
	function encryptIt($q) {
		$cryptKey = 'RaqJB0rGtIn5keUB1xG03efyCpsh';
		$qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
		return($qEncoded);
	}
	
	function decryptIt($q) {
		$cryptKey = 'RaqJB0rGtIn5keUB1xG03efyCpsh';
		$qDecoded = rtrim( mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
		return($qDecoded);
	}
?>