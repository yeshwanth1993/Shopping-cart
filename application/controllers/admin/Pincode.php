<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pincode extends CI_Controller {

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
		$result= $this->model_admin->get_pin();
		$data['pin'] = $result;
		$this->load->view('admin/header');

		$this->load->view('admin/pin', $data);
	}

	public function add()
	{
		$pin = $this->input->post('pin');
		$cost= $this->input->post('cost');
		$this->model_admin->add_pin($pin, $cost);
		redirect('admin/pincode');
	}

	public function remove()
	{
		$pin = $this->input->post('pin');
		$this->model_admin->remove_pin($pin);
		redirect('admin/pincode');
	}


}

?>