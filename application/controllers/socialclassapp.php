<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socialclassapp extends CI_Controller {
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function getStudentsEnrolledInClass($classId)
	{
		$sql = "SELECT * FROM enrollments "
			. "JOIN students ON enrollments.student_id = students.id "
//			. "WHERE coordinates.id IN (SELECT MAX(coordinates.id) FROM coordinates GROUP BY user_id) "
			. "WHERE class_id = '" . $classId . "' ";
//			. "AND user_id <> " . $userId;
		
		$query = $this->db->query($sql);
		
		// Check if there are results
		if ($query->num_rows() > 0)
		{
			echo json_encode($query->result());
		} else {
			echo json_encode(array($this->db->last_query()));
		}		
	}
	
//	public function read($userId = 0)
//	{
//		$sql = "SELECT * FROM coordinates "
//			. "JOIN users ON coordinates.user_id = users.id "
//			. "WHERE coordinates.id IN (SELECT MAX(coordinates.id) FROM coordinates GROUP BY user_id) "
//			. "AND user_id <> " . $userId;
//		
//		$query = $this->db->query($sql);
//		
//		// Check if there are results
//		if ($query->num_rows() > 0)
//		{
//			echo json_encode($query->result());
//		} else {
//			echo json_encode(array($this->db->last_query()));
//		}
//	}
//	
//	public function authenticate($fbUserId)
//	{
//		$sql = "SELECT * FROM users "
//			. "WHERE fb_user_id = '" . $fbUserId . "' "
//			. "AND is_deleted = 0";
//		
//		$query = $this->db->query($sql);
//		
//		echo json_encode($query->result());
//	}
//	
//	public function signup($fbUserId, $deviceId, $firstName = '', $lastName = '', $gender = NULL)
//	{
//		//New user
//		$sql = "INSERT INTO users "
//			. "(fb_user_id, device_id, first_name, last_name, dob, gender, is_deleted) "
//			. "VALUES ('" . $fbUserId . "', '" . $deviceId . "', '" . $firstName . "', '" . $lastName . "', NULL, NULL, 0)";
//		
//		$query = $this->db->query($sql);
////		echo json_encode(array($this->db->last_query()));
//		echo json_encode(array($this->db->insert_id()));
//	}
//	
//	public function setPhoneNumber($fbUserId, $phoneNumber)
//	{
//		$sql = "UPDATE users SET phone_number = '".$phoneNumber."' WHERE fb_user_id = '".$fbUserId."'";
//		
//		$query = $this->db->query($sql);
////		echo json_encode(array($this->db->last_query()));
//		echo json_encode(array($this->db->insert_id()));
//	}
//	
//	public function getPhoneNumber($fbUserId)
//	{
//		$sql = "SELECT * FROM users "
//			. "WHERE id = " . $fbUserId . " "
//			. "AND is_deleted = 0";
//		
//		$query = $this->db->query($sql);
//		echo json_encode($query->result());
//	}
//	
//	public function update($latitude, $longitude, $userId)
//	{
//		//Update user's location
//		$sql = "INSERT INTO coordinates "
//			. "(latitude, longitude, user_id) "
//			. "VALUES (" . $latitude . ", " . $longitude . ", " . intval($userId) . ")";
//		
//		$query = $this->db->query($sql);	
//		echo json_encode(array($this->db->insert_id()));
//	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */