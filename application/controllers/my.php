<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$userid = $this->session->userdata('userid');

		$this->load->model('usercard_model');
		$this->load->model('card_model');
		$usercards = $this->usercard_model->select_usercard_by_userid($userid);
		$usercard_map = array();
		foreach ($usercards as $key => $value) {
			$usercard_map[$value["cardid"]] = $value;
		}

		$cards = $this->card_model->select_all_card();
		foreach ($cards as $key => $value) {
			if(array_key_exists($value['id'], $usercard_map)){
				$cards[$key]['usercardid'] = $usercard_map[$value['id']]['id'];
			}
		}

		$total = sizeof($cards);
		$mytotal = sizeof($usercard_map);

		$data = array();
		$data['cards'] = $cards;
		$data['total'] = $total;
		$data['mytotal'] = $mytotal;


		$this->load->view('my', $data);

	}

	public function view($usercardid)
	{
		$is_new = $_GET['new'];

		$this->load->model('usercard_model');
		$usercard = $this->usercard_model->select_usercard_by_usercardid($usercardid);

		if($is_new === 'true')
			$message = "새 카드를 발견했습니다.";
		elseif($is_new === 'false')
			$message = "이미 발견한 카드입니다.";
		else
			$message = "";

		$data = array();
		$data['usercard'] = $usercard;
		$data['message'] = $message;

		$this->load->view("view", $data);
	}

}
