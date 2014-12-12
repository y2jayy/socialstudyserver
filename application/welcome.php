<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function read()
	{
		// This SQL statement selects ALL from the table 'Locations'
		$sql = "SELECT * FROM coordinates"
			. "JOIN users ON coordinates.user_id = users.id"
			. "WHERE coordinates.id IN (SELECT MAX(coordinates.id) FROM coordinates GROUP BY user_id)"
			. "WHERE user_id <> " . $_GET['user_id'];
echo $_GET['user_id'];
		$query = $this->db->query($sql);
		
		
		// Check if there are results
		if ($query->num_rows() > 0)
		{
			echo json_encode($query->result());
		}
	}
	
	public function update()
	{
		echo "Hello";
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */