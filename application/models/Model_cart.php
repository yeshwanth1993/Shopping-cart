<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cart extends CI_Model 
{
	function __construct () {
		$this->load->database();
		parent::__construct();
	}

	public function add_to_cart($product_id, $quantity)
	{
		if (isset($_SESSION['cart'])) 
		{
			for ($i =0; $i<$quantity; $i++ )
			{
				array_push($_SESSION['cart'],$product_id);
			}
		}	
		else
		{
			$_SESSION['cart']=array( $product_id);
		}
		return 1;
	}

	public function update_cart_db()
	{
		if (isset($_SESSION['cart']))
		{
			$cart= $_SESSION['cart'];
			if ($cart)
			{
				$email = $_SESSION['email'];
				$cart_json = json_encode($cart);

				$query= "SELECT * FROM cart where email='$email'";
				$result= $this->db->query($query);
				if($this->db->affected_rows() === 1 )
				{
					$query_1= "UPDATE cart SET items='$cart_json' where email = '$email'";
					$result_1= $this->db->query($query_1);
				}
				else
				{
					$query_2= "INSERT INTO cart (email, items) values ('$email', '$cart_json')";
					$result_2= $this->db->query($query_2);
				}
			}
			elseif(isset($_SESSION['email']))
			{
				$this->model_cart->remove_cart_db_all();
			}
		}
		else
		{
			$this->model_cart->remove_cart_db_all();
		}
		
	}

	public function remove_array_item( $array, $item ) 
	{
		$index = array_search($item, $array);
		if ( $index !== false ) 
		{
			unset( $array[$index] );
		}

		return $array;
	}

	public function remove_cart_db_all()
	{
		$email= $_SESSION['email'];
		$query_2= "DELETE FROM cart where email='$email'";
		$result_2= $this->db->query($query_2);
	}

	public function remove_cart($product_id)
	{
		$result= array_diff($_SESSION['cart'],Array($product_id));
		$_SESSION['cart']= $result;
	}

	public function total_cart()
	{
		$total_cart= 0;
		if (isset($_SESSION['cart']))
		{
			$cart= $_SESSION['cart'];
			$cart_unique= array_count_values($cart);
			
			foreach ($cart_unique as $key => $value) 
			{
				$query= "SELECT * FROM products where product_id='$key'";
				$result= $this->db->query($query);

				foreach ($result->result() as $tuple)
			    {
			    	$total_cart = $total_cart + $tuple->new_price* $value;
			    } 
			}

			return $total_cart;
		}
		else
		{
			return $total_cart;
		}
	}
	public function view_cart_order_his($cart)
	{
		$cart_unique= array_count_values($cart);
		$data= '';
		foreach ($cart_unique as $key => $value) 
		{
			$query= "SELECT * FROM products where product_id='$key'";
			$result= $this->db->query($query);

			foreach ($result->result() as $tuple)
		    {
				$result_func= $this->model_html->cart_display_order_his($tuple, $value);
				$data= $data.$result_func;
		    }
		}
		return $data;
		
	}


	public function view_cart()
	{
		if (!isset($_SESSION['cart'])) 
		{
			return 'No items in cart';
		}	
		else
		{
			$cart= $_SESSION['cart'];
			$cart_unique= array_count_values($cart);
			
			$data= '';

			foreach ($cart_unique as $key => $value) 
			{
				$query= "SELECT * FROM products where product_id='$key'";
				$result= $this->db->query($query);

				foreach ($result->result() as $tuple)
			    {
					$result_func= $this->model_html->cart_display($tuple, $value);
					$data= $data.$result_func;
			    }
			}
			return $data;
		}
	}

	public function view_cart_email()
	{
		if (!isset($_SESSION['cart'])) 
		{
			return 'No items in cart';
		}	
		else
		{
			$cart= $_SESSION['cart'];
			$cart_unique= array_count_values($cart);
			
			$data= '';

			foreach ($cart_unique as $key => $value) 
			{
				$query= "SELECT * FROM products where product_id='$key'";
				$result= $this->db->query($query);

				foreach ($result->result() as $tuple)
			    {
					$result_func= $this->model_html->cart_display_email($tuple, $value);
					$data= $data.$result_func;
			    }
			}
			return $data;
		}
	}

	public function view_cart_chk()
	{
		if (!isset($_SESSION['cart'])) 
		{
			return 'No items in cart';
		}	
		else
		{
			$cart= $_SESSION['cart'];
			$cart_unique= array_count_values($cart);
			
			$data= '';

			foreach ($cart_unique as $key => $value) 
			{
				$query= "SELECT * FROM products where product_id='$key'";
				$result= $this->db->query($query);

				foreach ($result->result() as $tuple)
			    {
					$result_func= $this->model_html->cart_display_chk($tuple, $value);
					$data= $data.$result_func;
			    }
			}
			return $data;
		}
	}
}