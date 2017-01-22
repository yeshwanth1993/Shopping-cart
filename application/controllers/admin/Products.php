<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		$result= $this->model_admin->get_products();
		$data['products'] = $result;
		$this->load->view('admin/header');
		$this->load->view('admin/products', $data);
	}

	public function remove()
	{
		$id= $this->input->get('id');
		$result = $this->model_admin->delete_product($id);
		redirect("admin/products");
	}

	public function add()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/add_products');
	}

	public function edit()
	{	
		$id= $this->input->get('id');
		$result = $this->model_admin->product_details($id);
		$this->load->view('admin/header');
		$this->load->view('admin/edit_products',$result);
	}

	public function add_product()
	{

	$name= $this->input->post('name');
	$description= $this->input->post('description');
	$popularity= $this->input->post('popularity');
	$new_price= $this->input->post('new_price');
	$old_price= $this->input->post('old_price');
	$new= $this->input->post('new');
	$featured= $this->input->post('featured');
	$quantity= $this->input->post('quantity');
	$cat= $this->input->post('category');
	$sub_cat= $this->input->post('sub_category');
	$result = $this->model_admin->insert_product($name, $description, $cat, $sub_cat, $old_price, $new_price, $new, $featured, $quantity, $popularity);

	echo "<script>alert('Product Inserted, Please note product ID= ".$result."');
			window.location = '".base_url()."/admin/products/add';</script>";

	}

	public function edit_product()
	{
	$id= $this->input->post('id');
	$name= $this->input->post('name');
	$description= $this->input->post('description');
	$popularity= $this->input->post('popularity');
	$new_price= $this->input->post('new_price');
	$old_price= $this->input->post('old_price');
	$new= $this->input->post('new');
	$featured= $this->input->post('featured');
	$quantity= $this->input->post('quantity');
	$cat= $this->input->post('category');
	$sub_cat= $this->input->post('sub_category');
	$result = $this->model_admin->update_product($name, $description, $cat, $sub_cat, $old_price, $new_price, $new, $featured, $quantity, $popularity, $id);

	echo "<script>alert('Product Updated, Please note product ID= ".$result."');
			window.location = '".base_url()."/admin/products';</script>";

	}

}

?>