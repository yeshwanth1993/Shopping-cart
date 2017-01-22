<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nathantraders	extends CI_Controller {

	function __construct () 
	{
		error_reporting(0);
		parent::__construct();
		$this->session;
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/login');

	}

	public function login()
	{
		$mail= $this->input->post('email');
		$pass= $this->input->post('password');
		$new_pass= md5($pass);
		$result = $this->model_admin->login_user($mail, $new_pass);
        if ($result)
			redirect("admin/dashboard");
        else 
        {
			redirect("admin");
        }

	}
	
	public function logout()
	{
		$result = $this->model_user->logout_user();
		$this->index();
	}
}

?>
