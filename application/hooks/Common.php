<?php
function authcheck() {
	$CI =& get_instance();

	$userid = $CI->session->userdata('userid');

	$pass_class = array('login', 'signup');
	if(in_array($CI->router->fetch_class(), $pass_class)){
		if($userid){
			redirect('/');
		}
	}else{
		if(empty($userid)){
			redirect('/login', 'refresh');
		}
		if($CI->router->fetch_class() == 'admin'){
			if($userid != 'admin'){
				redirect('/', 'refresh');
			}
		}
	}

}
?>