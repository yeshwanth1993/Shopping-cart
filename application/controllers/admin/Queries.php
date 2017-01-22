<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queries extends CI_Controller {

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
		$result= $this->model_admin->get_queries();
		$data['queries'] = $result;
		$this->load->view('admin/header');

		$this->load->view('admin/queries', $data);
	}


}

?>