<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Card_model extends CI_Model {

	public $id;
	public $code;
	public $title;
	public $image;
	public $description;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select_all_card()
	{
		$query = $this->db->get('cards');
		return $query->result_array();
	}

	public function select_card_by_id($id)
	{
		if(!$id){
			throw new Exception("카드 아이디가 누락되었습니다.", 1);
		}
		$this->db->where('id', $id);
		$query = $this->db->get('cards');
		return $query->row_array();
	}

	public function select_card_by_code($code)
	{
		if(!$code){
			throw new Exception("코드가 누락되었습니다.", 1);
		}
		$this->db->where('code', $code);
		$query = $this->db->get('cards');
		return $query->row_array();
	}

	public function insert_card($code, $title, $image, $description)
	{
		$target_file = "";
		if(!$code){
			throw new Exception("코드를 입력해주세요.", 1);
		}
		if(!$title){
			throw new Exception("이름을 입력해주세요.", 1);
		}

		if($image){
			$target_dir = "/uploads/";
			$target_file = $target_dir.basename($image['name']);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$check = getimagesize($image["tmp_name"]);
			if($check === false) {
				throw new Exception("File is not an image.", 1);
			}
			if (!move_uploaded_file($image["tmp_name"], SITE_ROOT.$target_file)) {
				throw new Exception("Sorry, there was an error uploading your file.", 1);
			}
		}

		$this->code = $code;
		$this->title = $title;
		$this->image = $target_file;
		$this->description = $description;

		$this->db->insert('cards', $this);

		return true;
	}

	public function delete_card($id)
	{
		if(empty($id)){
			throw new Exception("아이디가 누락되었습니다.", 1);
		}
		$this->db->where("id", $id);
		$this->db->delete("cards");
	}
}
?>