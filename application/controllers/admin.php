<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model("usercard_model");
		$user_statistics = $this->usercard_model->select_useracrd_for_statistics_by_user();
		$card_statistics = $this->usercard_model->select_useracrd_for_statistics_by_card();

		$data = array();
		$data['user_statistics'] = $user_statistics;
		$data['card_statistics'] = $card_statistics;

		$this->load->view('admin/main', $data);
	}

	public function card()
	{
		$this->load->model('card_model');
		$cards = $this->card_model->select_all_card();

		$data = array();
		$data['cards'] = $cards;

		$this->load->view('admin/card', $data);
	}

	public function card_detail($cardid)
	{
		$this->load->model('card_model');
		try {
			$card = $this->card_model->select_card_by_id($cardid);
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;
		}

		$data = array();
		$data['card'] = $card;

		$this->load->view('admin/card_detail', $data);
	}

	public function card_new()
	{
		$this->load->helper('card');
		$new_code = generate_random_code();

		$data = array();
		$data['new_code'] = $new_code;

		$this->load->view('admin/card_new', $data);
	}

	public function card_new_process()
	{
		$code = $_POST['code'];
		$title = $_POST['title'];
		$image = $_FILES['image'];
		$description = $_POST['description'];

		$this->load->model('card_model');
		try {
			$this->card_model->insert_card($code, $title, $image, $description);
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;
		}
		alertmsg_move('카드가 등록되었습니다.', '/admin/card');
	}

	public function card_delete($cardid)
	{
		$this->load->model('card_model');
		try {
			$this->card_model->delete_card($cardid);
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;
		}

		alertmsg_move('카드가 삭제되었습니다.', '/admin/card');
	}

	public function show_qrcode($code)
	{
		$this->load->helper('card');
		generate_code_image($code);
	}

	public function user()
	{
		$this->load->model('user_model');
		$users = $this->user_model->select_all_user();

		$data = array();
		$data['users'] = $users;

		$this->load->view("admin/user", $data);
	}

	public function user_detail($id)
	{
		$this->load->model('user_model');
		try {
			$user = $this->user_model->select_user_by_id($id);
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;
		}

		$data = array();
		$data['user'] = $user;

		$this->load->view("admin/user_detail", $data);

	}

	public function user_new()
	{
		$this->load->view("admin/user_new");
	}

	public function user_new_process()
	{
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$this->load->model('user_model');
		try {
			$this->user_model->insert_user($userid, $password, $password);
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;
		}
		alertmsg_move('사용자가 등록되었습니다.', '/admin/user');
	}

	public function user_delete($id)
	{
		$this->load->model('user_model');
		try {
			$this->user_model->delete_user($id);
		} catch (Exception $e) {
			alertmsg_move($e->getMessage());
			return ;
		}

		alertmsg_move('사용자가 삭제되었습니다.', '/admin/user');
	}

}
