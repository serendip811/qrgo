<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Usercard_model extends CI_Model {

	public $id;
	public $userid;
	public $cardid;
	public $timestamp;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select_usercard_by_usercardid($id){
		$this->db->where('usercards.id', $id);
		$this->db->join('cards', 'cards.id = usercards.cardid');
		$query = $this->db->get('usercards');
		return $query->row_array();
	}

	public function select_usercard_by_userid_and_cardid($userid, $cardid)
	{
		$this->db->where('userid', $userid);
		$this->db->where('cardid', $cardid);
		$query = $this->db->get('usercards');
		return $query->row_array();
	}


	public function select_usercard_by_userid($userid)
	{
		$this->db->where('userid', $userid);
		$query = $this->db->get('usercards');
		return $query->result_array();
	}

	public function insert_usercard($userid, $cardid)
	{
		if(!$userid){
			throw new Exception("아이디가 누락되었습니다.", 1);
		}
		if(!$cardid){
			throw new Exception("카드정보가 누락되었습니다.", 1);
		}

		$this->db->set('userid', $userid);
		$this->db->set('cardid', $cardid);
		$this->db->insert('usercards');

		return $this->db->insert_id();
	}

	public function select_useracrd_for_statistics_by_user()
	{

		$sql = "
			SELECT uc.userid, COUNT(*) AS cnt
			FROM usercards AS uc
				INNER JOIN users AS u ON u.userid = uc.userid
			GROUP BY uc.userid
			ORDER BY cnt DESC, MAX(timestamp) ASC;
		";

		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function select_useracrd_for_statistics_by_card()
	{

		$sql = "
			SELECT uc.cardid, COUNT(*) AS cnt, c.title, c.image
			FROM usercards AS uc
				INNER JOIN cards AS c ON c.id = uc.cardid
			GROUP BY uc.cardid
			ORDER BY cnt DESC;
		";

		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>