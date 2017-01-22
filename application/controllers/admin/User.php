<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$result= $this->model_admin->get_admin();
		$data['user'] = $result;
		$this->load->view('admin/header');

		$this->load->view('admin/user', $data);
	}

	public function add()
	{
		$email = $this->input->post('email');
		$password= $this->input->post('password');
		$new_pass = md5($password);
		$this->model_admin->add_admin($email, $new_pass);
		redirect('admin/user');
	}

	public function remove()
	{
		$email = $this->input->post('email');
		$this->model_admin->remove_admin($email);
		redirect('admin/user');
	}

	public function delete_cache() 
	{ 
		$this->output->delete_cache(''); 
		redirect('admin/queries');
	} 

}

?>