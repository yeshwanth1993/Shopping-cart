<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_order extends CI_Model 
{
	function __construct () {
		$this->load->database();
		parent::__construct();
	}

	public function process_order($name, $email, $cost, $address, $phone, $pin)
	{	
		$cart = $_SESSION['cart'];
		$cart_json = json_encode($cart);
		$sql= "INSERT INTO orders (name, email, items, payment_type, cost, phone, address, pincode, status) 
		VALUES ('$name', '$email', '$cart_json', 'COD', '$cost', '$phone', '$address', '$pin', '0')";
		$result	= $this->db->query($sql);
		$order_id = $this->db->insert_id() ;

		if ($this->db->affected_rows() === 1 ) 
		{
			return $order_id;
		}
	}

	public function order_history($email)
	{
		$sql = "SELECT * from orders where email= '$email' order by time DESC";
		$result= $this->db->query($sql);
		$data= '';
		foreach ($result->result() as $tuple) 
		{
			$result_func= $this->model_html->order_history($tuple);
			$data= $data.$result_func;
		}
		return $data;
	}

	public function chk_pin_cost($pincode)
	{
		$sql= "SELECT * from pin where pincode='$pincode'";

		$result= $this->db->query($sql);

		foreach ($result->result() as $tuple) 
		{
			return $tuple->cost;
		}
	}

	public function send_admin_email($name, $email, $address, $phone, $pin, $order_id, $cost)
	{
		$email_admin = $this->model_admin->get_admin_sep();
		$view_cart= $this->model_cart->view_cart_email();
		$final_message = 'New Order has been placed by '.$name.'<br>
		Email: '.$email.'
		<br>Phone'.$phone.'
		<br>Address:'.$address.'
		<br>Pin:'.$pin.'<br>Total cost: Rs. '.$cost.'<br><br>'.$view_cart;
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$subject = "Order ID: ".$order_id;
        $this->email->from('nathantraderschennai@gmail.com', 'New Order');
        $this->email->to($email_admin); 
        $this->email->subject($subject);
        $this->email->message($final_message);
		$result = $this->email->send();
	}

	public function send_user_email($name, $email, $address, $phone, $pin, $order_id, $cost)
	{
		$final_message = 'Thanks for placing your order. <br>We will send a processing E-mail as soon as we are done with the processing. Please see the Order history page to see the status of your order. 
                <br> <br>
            If you have signed in as a guest, we will send you the details of where your order will be shipped from, via E-mail and you can contact that particular branch to know the status.<br>We will contact you at@'.$phone.'<br>Deliver @'.$address.'<br>Total cost: Rs. '.$cost;
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$subject = "Order ID: ".$order_id;
        $this->email->from('nathantraderschennai@gmail.com', 'Nathantraders');
        $this->email->to($email); 
        $this->email->subject($subject);
        $this->email->message($final_message);
		$result = $this->email->send();
	}



}

?>