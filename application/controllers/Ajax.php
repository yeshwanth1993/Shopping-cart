<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax	extends CI_Controller {

	function __construct () 
	{
		error_reporting(0);
		parent::__construct();
	}


	public function check_dil_crg()
	{

		$pin = $this->input->post('pincode');

		$dil_cost = $this->model_order->chk_pin_cost($pin);
		$total_cart= $this->model_cart->total_cart();

		
		// $grand_total= $total_cost + $dil_cost;

		$ret['grand_cost']= $total_cart;
		$ret['dil_cost']= $dil_cost;
		$ret['cart']= $_SESSION['cart'];

		echo json_encode($ret);
	}
}

?>
