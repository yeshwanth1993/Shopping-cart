<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard	extends CI_Controller {

	function __construct () 
	{
		error_reporting(0);
		parent::__construct();
		$this->session;
		$this->load->library('form_validation');
		if(!isset($_SESSION['admin']))
		{
			redirect("admin");
		}
	}

	public function index()
	{

		redirect('admin/queries');

	}


}

?>
