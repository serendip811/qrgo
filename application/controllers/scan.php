<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan extends CI_Controller {

	public function index()
	{

	}
	public function card($code)
	{
		$userid = $this->session->userdata('userid');
		$this->load->model("usercard_model");
		$this->load->model("card_model");
		try {
			$card = $this->card_model->select_card_by_code($code);
			$usercard = $this->usercard_model->select_usercard_by_userid_and_cardid($userid, $card['id']);
			if($usercard == null)
				$usercardid = $this->usercard_model->insert_usercard($userid, $card['id']);
			else
				redirect("my/view/".$usercard['id']."?new=false");
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;			
		}

		redirect("my/view/".$usercardid."?new=true");
	}

}
