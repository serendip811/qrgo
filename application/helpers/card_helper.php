<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(SITE_ROOT.'/phpqrcode/qrlib.php');

function generate_code_image($code){
	QRcode::png("http://".$_SERVER['HTTP_HOST']."/scan/card/".$code, false, QR_ECLEVEL_L, 10);
}

function generate_random_code(){
	$code = "";
	$length = 8;

	$chars = array_merge(range('a', 'z'), range('A', 'Z'));
	$chars = array_flip($chars);

	while($length > 0) {
		$code .= array_rand($chars);
		$length--;
	}
	return $code;
}
