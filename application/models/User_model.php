<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class User_model extends CI_Model {

	public $id;
	public $userid;
	public $password;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select_all_user()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function select_user_by_id($id)
	{
		if(!$id){
			throw new Exception("아이디가 누락되었습니다.", 1);
		}
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	public function select_user_by_userid($userid)
	{
		if(!$userid){
			throw new Exception("아이디를 입력해주세요.", 1);
		}
		$this->db->where('userid', $userid);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	public function select_user_by_userid_and_password($userid, $password)
	{
		if(!$userid){
			throw new Exception("아이디를 입력해주세요.", 1);
		}
		if(!$password){
			throw new Exception("비밀번호를 입력해주세요.", 1);
		}
		$this->db->select('id, userid');
		$this->db->where('userid', $userid);
		$this->db->where('password', "PASSWORD('".$password."')", false);
		$query = $this->db->get('users');
		return $query->row_array();
	}

	public function insert_user($userid, $password, $confirm_password)
	{
		if(!$userid){
			throw new Exception("아이디를 입력해주세요.", 1);
		}
		if($password != $confirm_password){
			throw new Exception("비밀번호를 확인해주세요.", 1);
		}
		if(strlen($password) < 4){
			throw new Exception("비밀번호는 4자 이상 입력해주세요.", 1);
		}
		if(strlen($userid) < 4){
			throw new Exception("아이디는 4자 이상 입력해주세요.", 1);
		}
		if($this->select_user_by_userid($userid)){
			throw new Exception("이미 존재하는 아이디입니다.", 1);
		}

		$this->password = $password;
		$this->db->set('userid', $userid);
		$this->db->set('password', "PASSWORD('".$password."')", false);

		$this->db->insert('users');

		return true;
	}

	public function delete_user($id)
	{
		if(empty($id)){
			throw new Exception("아이디가 누락되었습니다.", 1);
		}
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}
?>