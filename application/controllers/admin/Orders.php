<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

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
		$order_history= $this->model_admin->order_history();
		$data['order_history'] = $order_history;
		$this->load->view('admin/header');
		$this->load->view('admin/orders', $data);

	}

	public function update()
	{
		$data = $this->input->post();
		$order_history= $this->model_admin->update_order($data);
		redirect('admin/orders');

	}


}

?>
