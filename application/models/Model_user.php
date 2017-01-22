<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model 
{
	function __construct () {
		$this->load->database();
		parent::__construct();
	}

	public function insert_user($mail, $name, $new_pass, $add, $ph, $pin)
	{	
		
		$sql= "INSERT INTO users (email, name, password, address, phone, add_pincode) VALUES(?, ?, ?, ?, ?, ?)";
		$result	= $this->db->query($sql, array($mail, $name, $new_pass, $add, $ph, $pin));

		
		if ($this->db->affected_rows() === 1 ) 
		{
			return $mail;
		}
		else
		{
			return 0;
		}
	}

	public function change_password($old_pass, $new_pass)
	{	
		$old_pass = md5($old_pass);
		$new_pass = md5($new_pass);
		$email = $_SESSION['email'];
		
		$sql= "UPDATE users SET password=? where email = ? AND password = ?";
		$result	= $this->db->query($sql, array($new_pass, $email, $old_pass));

		
		if ($this->db->affected_rows() === 1 ) 
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function change_details($phone, $add, $pin)
	{	
		$email = $_SESSION['email'];
		$sql= "UPDATE users SET phone=?, add_pincode=?, address=? where email = ? ";
		$result	= $this->db->query($sql, array($phone, $pin, $add, $email));

		
		if ($this->db->affected_rows() === 1 ) 
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}


	public function contact_query($name, $mail, $message)
	{	
		
		$sql= "INSERT INTO queries (name, email, query, replied) VALUES(?, ?, ?, '0')";
		$result	= $this->db->query($sql, array($name, $mail, $message));

		
		if ($this->db->affected_rows() === 1 ) 
		{
			return $name;
		}
	}

	public function login_user($mail, $new_pass)
	{

		$sql= "SELECT * FROM users WHERE email=? AND password=?";
		$result	= $this->db->query($sql, array($mail, $new_pass));

		if ($this->db->affected_rows() === 1 ) 
		{
			foreach ($result->result() as $tuple)
			{
				$_SESSION['name'] = $tuple->name;
				$_SESSION['email'] = $tuple->email;
			}

			$sql_1= "SELECT * FROM cart WHERE email='$mail'";
			$result_1	= $this->db->query($sql_1);
			if ($this->db->affected_rows() === 1 ) 
			{
				foreach ($result_1->result() as $tuple_1)
				{	
					if(!isset($_SESSION['cart']))
						$_SESSION['cart'] = json_decode($tuple_1->items,true);
					else
					{
						$add_cart = json_decode($tuple_1->items,true);	
						foreach ($add_cart as $key => $value)
						{
							array_push($_SESSION['cart'],$value); 
						} 
					}

				}
			}
			return $result;
		}

	}
	public function get_details($email)
	{
		$sql= "SELECT * FROM users WHERE email=?";
		$result	= $this->db->query($sql, array($email));
		foreach ($result->result() as $tuple)
		{
			return array("name" =>$tuple->name, "add" =>$tuple->address, "pin" =>$tuple->add_pincode, "phone" =>$tuple->phone);
		}
	}

	public function logout_user()
	{
		$this->load->library('session');
		unset($_SESSION);
		$this->session->sess_destroy();
	}

	public function generateRandomString($length = 10) 
	{
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) 
	    {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function password_reset($email)
	{
		$sql= "SELECT * FROM users WHERE email=?";
		$result	= $this->db->query($sql, array($email));

		if ($this->db->affected_rows() === 1 ) 
		{
			foreach ($result->result() as $tuple)
			{
				$password = $this->model_user->generateRandomString();
				$password_new = md5($password);
				$final_message = 'Password reset requested by '.$tuple->name.'<br>
				Email: '.$tuple->email.'
				<br>Phone'.$tuple->phone.'
				<br>Address:'.$tuple->address.'
				<br>Pin:'.$tuple->add_pincode.'<br>New Password is: '.$password;
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$subject = "Password reset.";
		        $this->email->from('nathantraderschennai@gmail.com');
		        $this->email->to($email); 
		        $this->email->subject($subject);
		        $this->email->message($final_message);
				$result = $this->email->send();

				$sql_1= "UPDATE users SET password= ? WHERE email=? ";
				$result_1	= $this->db->query($sql_1, array($password_new, $email));

			}
		return 1;
		}
	}
}

?>