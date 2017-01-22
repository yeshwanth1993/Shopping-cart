<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nathantraders	extends CI_Controller {

	function __construct () 
	{
		parent::__construct();
		$this->session;
		$this->load->library('form_validation');
		error_reporting(0);
	}

	public function index()
	{
		$this->output->cache(1440);
		$data = $this->model_product->featured_products();
		$products = Array('featured_products'=> $data);
		$this->load->view('v/header');
		$this->load->view('v/body-home',$products);
		$this->load->view('v/footer');
	}

	public function login()
	{
		$this->load->view('v/header');
		$this->load->view('v/login');
		$this->load->view('v/footer');
	}

	public function login_try()
	{
		$mail= $this->input->post('email');
		$pass= $this->input->post('password');
		$new_pass= md5($pass);
		$result = $this->model_user->login_user($mail, $new_pass);
		$data = array('username' => $result,'signup_sucess' => '<p style="color:red;">Login Failed Try again! </p>');
        if ($result)
			$this->index();
        else 
        {
			$this->load->view('v/header');
			$this->load->view('v/login',$data);
			$this->load->view('v/footer');
        }

	}

	public function logout()
	{
		$data = $this->model_cart->update_cart_db();
		$result = $this->model_user->logout_user();
		$this->index();
	}
		
	public function signup()
	{
		$this->load->view('v/header');
		$this->load->view('v/signup');
		$this->load->view('v/footer');    	
	}

	public function signup_try()
	{
		$mail= $this->input->post('email');
		$name= $this->input->post('name');
		$pass= $this->input->post('password');
		$pass_1= $this->input->post('password_1');
		$new_pass= md5($pass);
		$add= $this->input->post('add');
		$pin= $this->input->post('pin');
		$ph= $this->input->post('ph');

		if($pass != $pass_1)
		{
			$data= array('signup_fail' => '<p style="color:red;">Passwords do not match. </p>');
			$this->load->view('v/header');
			$this->load->view('v/signup', $data);
			$this->load->view('v/footer');
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('password_1', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('ph', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('add', 'Address', 'trim|required|min_length[5]|max_length[128]');
		$this->form_validation->set_rules('pin', 'Pincode', 'required|min_length[6]');

        if ($this->form_validation->run() == TRUE)
        {
        	$result = $this->model_user->insert_user($mail, $name, $new_pass, $add, $ph, $pin);
    		$data = array('username' => $result,'signup_sucess' => '<p style="color:green;">Signup success! You can login now. </p>');
    		if($result)
    		{
				$this->load->view('v/header');
				$this->load->view('v/login',$data);
				$this->load->view('v/footer');
			}
			else
			{
	        	$data= array('signup_fail' => '<p style="color:red;">User already exists, try resetting your password or create an account using a new E-mail.</p>');
				$this->load->view('v/header');
				$this->load->view('v/signup',$data);
				$this->load->view('v/footer');
			}
        }

        else 
        {
			$this->load->view('v/header');
			$this->load->view('v/signup');
			$this->load->view('v/footer');
        }

	}
	public function all_products()
	{
		$data = $this->model_product->all_products();
		$products = Array('search_products'=> $data, 'heading'=> 'All Products');
		$this->load->view('v/header');
		$this->load->view('v/search',$products);
		$this->load->view('v/footer');
	}

	public function account()
	{
		redirect("nathantraders/order_history");
	}

	public function category()
	{
		$cat= $this->input->get('category');
		$sub_cat= $this->input->get('sub_category');
		$sort= $this->input->get('sort');

		$data = $this->model_product->category($cat, $sub_cat, $sort);
		$products = Array('search_products'=> $data, 'heading'=> $cat, 'sub_heading'=> $sub_cat, 'sort'=> $sort);
		$this->load->view('v/header');
		$this->load->view('v/search',$products);
		$this->load->view('v/footer');
	}

	public function search()
	{
	 	$query= $this->input->get('search');
	 	$sort= $this->input->get('sort');

		$data = $this->model_product->search_products($query, $sort);
		$heading = 'Search Results: '.$query;
		$products = Array('search_products'=> $data, 'heading'=> $heading , 'search' => $query, 'sort'=> $sort);

		$this->load->view('v/header');
		$this->load->view('v/search',$products);
		$this->load->view('v/footer');
	}

	public function  order_history()
	{
		if(isset($_SESSION['name']))
		{
			$email = $_SESSION['email'];
			$order_history= $this->model_order->order_history($email);

			if($order_history=='')
				$data['order_history']= "You haven't ordered any items yet.";
			$data['order_history']= $order_history;

			$this->load->view('v/header');
			$this->load->view('v/order_history', $data);
			$this->load->view('v/footer');
		}
		else
			redirect("nathantraders/cart");
	}

	public function checkout()
	{
		if(!empty($_SESSION['cart']))
		{
			if(isset($_SESSION['email']))
			{
				$data =$this->model_user->get_details($_SESSION['email']);
				$view_cart= $this->model_cart->view_cart_chk();
				$data['view_cart']= $view_cart;


				$this->load->view('v/header');
				$this->load->view('v/checkout', $data);
				$this->load->view('v/footer');
			}
			else
			{
				$view_cart= $this->model_cart->view_cart_chk();
				$data['view_cart']= $view_cart;
				$total_cart= $this->model_cart->total_cart();
				$data['total_cart']= $total_cart;
				$this->load->view('v/header');
				$this->load->view('v/checkout_guest', $data);
				$this->load->view('v/footer');    	
			}
		}
		else
			redirect("nathantraders/cart");
	}

	public function product()
	{
		$product_id= $this->input->get('product_id');
		$data = $this->model_product->product_details($product_id);
		$similar_products = $this->model_product->similar_products($data['category'],$data['sub_category'], $product_id);
		$data['similar_products'] = $similar_products;
		$this->load->view('v/header');
		$this->load->view('v/body-product',$data);
		$this->load->view('v/footer');
	}

	public function cart()
	{
		$view_cart= $this->model_cart->view_cart();
		$data['view_cart']= $view_cart;
		$total_cart= $this->model_cart->total_cart();
		$data['total_cart']= $total_cart;

		$this->load->view('v/header');
		$this->load->view('v/cart',$data);
		$this->load->view('v/footer');
	}

	// public function update_cart()
	// {
	// 	$data= $this->input->post();
	// 	$cart= Array();

	// 	foreach ($data as $key => $value) 
	// 	{
	// 		for ($i =0; $i<$value; $i++ )
	// 		{
	// 			array_push($cart,$key);
	// 		}
	// 	}
	// 	$_SESSION['cart']= $cart;
	// 	redirect("nathantraders/cart");

	// }
	

	public function update_cart_ajax()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');

		$cart_unique = array_count_values($_SESSION['cart']);
		try 
		{
			$actual_quan = $cart_unique["$product_id"];
		} 
		catch (Exception $e) 
		{
			$actual_quan = 0;
		}
		

		if($quantity>$actual_quan)
		{
			for ($i =0; $i<($quantity-$actual_quan); $i++ )
			{
				array_push($_SESSION['cart'],$product_id);
			}
		}

		if($quantity<$actual_quan)
		{
			for ($i =0; $i<($actual_quan-$quantity); $i++ )
			{
				$_SESSION['cart'] = $this->model_cart->remove_array_item( $_SESSION['cart'], $product_id); 
			}
		}
		$data["cart_total"] = $this->model_cart->total_cart();
		echo json_encode($data);
	}

	public function add_cart()
	{
		$quantity= $this->input->post('quantity');
		$product_id= $this->input->post('product_id'); 
		$data = $this->model_cart->add_to_cart($product_id, $quantity);
	  	redirect("nathantraders/cart");

	}

	public function remove_cart()
	{
		$product_id= $this->input->get('product_id'); 
		$data = $this->model_cart->remove_cart($product_id);
	  	redirect("nathantraders/cart");
	}

	public function buy_success()
	{
		$order_id= $this->input->get('order_id');
		$address= $this->input->get('add');
		$phone= $this->input->get('ph');

		$data['order_id'] = $order_id;
		$data['address'] = $address;
		$data['phone'] = $phone;

		$this->load->view('v/header');
		$this->load->view('v/buy_success',$data);
		$this->load->view('v/footer');
	}

	public function buy()
	{
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$name = $this->input->post('name');
		$pin = $this->input->post('pincode');
		$email = $this->input->post('email');

		$dil_cost = $this->model_order->chk_pin_cost($pin);
		$total_cart= $this->model_cart->total_cart();
		$cost= $total_cart + $dil_cost;

		if(!$email)
			$email=$_SESSION['email'];
		$order_id = $this->model_order->process_order($name, $email, $cost, $address, $phone, $pin);
		$this->model_order->send_admin_email($name, $email, $address, $phone, $pin, $order_id, $cost);
		$this->model_order->send_user_email($name, $email, $address, $phone, $pin, $order_id, $cost);
		unset($_SESSION['cart']);
		$this->model_cart->remove_cart_db_all();
	  	redirect("nathantraders/buy_success?order_id='$order_id'");
	}

	public function check_dil_crg()
	{
		$pin = $this->input->post('pincode');
		$dil_cost = $this->model_order->chk_pin_cost($pin);
		$total_cart= $this->model_cart->total_cart();
		$grand_total= $total_cart + $dil_cost;
		$ret['grand_cost']= $grand_total;
		if($dil_cost)
			$ret['dil_cost']= $dil_cost;
		else
			$ret['dil_cost']= False;
		echo json_encode($ret);
	}

	public function check_dil_crg_all_g()
	{	
		$pin = $this->input->post('pincode');
		$email = $this->input->post('email');
		$add = $this->input->post('address');
		$phone = $this->input->post('phone');

		$dil_cost = $this->model_order->chk_pin_cost($pin);
		$total_cart= $this->model_cart->total_cart();
		$grand_total= $total_cart + $dil_cost;
		$ret['grand_cost']= $grand_total;
		if($dil_cost)
			$ret['dil_cost']= $dil_cost;
		else
			$ret['dil_cost']= False;

		if($pin & $add & $phone & $email)
			$ret['details_filled']= True;
		else
			$ret['details_filled']= False;
		echo json_encode($ret);
	}

	public function check_dil_crg_all()
	{	
		$pin = $this->input->post('pincode');
		// $email = $this->input->post('email');
		$add = $this->input->post('address');
		$phone = $this->input->post('phone');

		$dil_cost = $this->model_order->chk_pin_cost($pin);
		$total_cart= $this->model_cart->total_cart();
		$grand_total= $total_cart + $dil_cost;
		$ret['grand_cost']= $grand_total;
		if($dil_cost)
			$ret['dil_cost']= $dil_cost;
		else
			$ret['dil_cost']= False;

		if($pin & $add & $phone)
			$ret['details_filled']= True;
		else
			$ret['details_filled']= False;
		echo json_encode($ret);
	}

	public function add_cart_ajax()
	{
		$product_id = $this->input->post('product_id');
		$data = $this->model_cart->add_to_cart($product_id, '1');
		$ret['cart_num']= count($_SESSION['cart']);
		echo json_encode($ret);
	}

	public function areas_we_serve()
	{
		$this->load->view('v/header');
		$this->load->view('v/areas_we_serve');
		$this->load->view('v/footer');
	}

	public function forgot_password()
	{
		$this->load->view('v/header');
		$this->load->view('v/forgot_password');
		$this->load->view('v/footer');
	}

	public function password_reset()
	{
		$email = $this->input->post('email');
		$status= $this->model_user->password_reset($email);
		if($status)
		{
			$ret['status']= 1;
			echo json_encode($ret);
		}
		else
		{
			$ret['status']= 0;
			echo json_encode($ret);
		}
	}

	public function change_details()
	{
		if(!isset($_SESSION['name']))
			redirect("nathantraders");

		$data= $this->model_user->get_details($_SESSION['email']);
		$this->load->view('v/header');
		$this->load->view('v/change_details', $data);
		$this->load->view('v/footer');
	}


	public function change_details_submit()
	{
		if(!isset($_SESSION['name']))
			redirect("nathantraders");
		$pin= $this->input->post('pin');
		$address= $this->input->post('address');
		$phone= $this->input->post('ph');

		$this->form_validation->set_rules('ph', 'Phone', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('pin', 'Pin', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == TRUE)
        {
        	$result = $this->model_user->change_details($phone, $address, $pin);
    		if($result)
    		{
    			$data= array('message' => 'Details Changed successfully!');
				$this->load->view('v/header');
				$this->load->view('v/change_details',$data);
				$this->load->view('v/footer');
			}
			else
			{
	        	$data= array('message' => 'Please try again!');
				$this->load->view('v/header');
				$this->load->view('v/change_details',$data);
				$this->load->view('v/footer');
			}
        }

        else 
        {
			$this->load->view('v/header');
			$this->load->view('v/change_details');
			$this->load->view('v/footer');
        }
    }

	public function change_password()
	{
		if(!isset($_SESSION['name']))
			redirect("nathantraders");
		$this->load->view('v/header');
		$this->load->view('v/change_password');
		$this->load->view('v/footer');
	}

	public function change_password_submit()
	{
		if(!isset($_SESSION['name']))
			redirect("nathantraders");
		$old_pass= $this->input->post('password');
		$new_pass= $this->input->post('new_password');
		$new_pass_1= $this->input->post('new_password_1');

		if($new_pass != $new_pass_1)
		{
			$data= array('message' => 'Passwords do not match.');
			$this->load->view('v/header');
			$this->load->view('v/change_password', $data);
			$this->load->view('v/footer');
		}

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('new_password', 'Password', 'trim|required|min_length[8]');

        if ($this->form_validation->run() == TRUE)
        {
        	$result = $this->model_user->change_password($old_pass, $new_pass);
 
    		if($result)
    		{
    			$data= array('message' => 'Password Change Success!');
				$this->load->view('v/header');
				$this->load->view('v/change_password',$data);
				$this->load->view('v/footer');
			}
			else
			{
	        	$data= array('message' => 'Incorrect current password entered. Please try again!');
				$this->load->view('v/header');
				$this->load->view('v/change_password',$data);
				$this->load->view('v/footer');
			}
        }

        else 
        {
			$this->load->view('v/header');
			$this->load->view('v/change_password');
			$this->load->view('v/footer');
        }
    }
}

?>
