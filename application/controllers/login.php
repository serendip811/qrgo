<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function process()
	{
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$this->load->model('user_model');
		try {
			$user = $this->user_model->select_user_by_userid_and_password($userid, $password);
			if($user == null){
				throw new Exception("아이디, 패스워드를 다시 확인해주세요.", 1);
			}
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
		}

		$this->session->set_userdata('userid', $user['userid']);

		redirect("/", "refresh");
	}

}
