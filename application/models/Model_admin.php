<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model 
{
	function __construct () {
		$this->load->database();
		parent::__construct();
	}


	public function login_user($mail, $new_pass)
	{

		$sql= "SELECT * FROM adminuser WHERE email=? AND password=?";
		$result	= $this->db->query($sql, array($mail, $new_pass));

		if ($this->db->affected_rows() === 1 ) 
		{
			foreach ($result->result() as $tuple)
			{
				$_SESSION['admin'] = TRUE;
				$_SESSION['email'] = $tuple->email;
			}
			return $result;
		}
	}

	public function logout_user()
	{
		$this->load->library('session');
		unset($_SESSION);
		$this->session->sess_destroy();
	}

	public function product_details($id)
	{	
		$sql= "SELECT * FROM products where product_id='$id'";
		$result	= $this->db->query($sql);
		foreach ($result->result() as $tuple)
		{
			 $data = Array ('id' => $tuple->product_id, 'name' => $tuple->product_name, 'description'=> $tuple->description,'popularity' => $tuple->popularity, 'old_price' => $tuple->old_price, 'new_price'=> $tuple->new_price, 'quantity' => $tuple->quantity, 'category' => $tuple->category,'sub_category' => $tuple->sub_category, 'new' => $tuple->new_product, 'featured' => $tuple->featured_product);
		}

		return $data;
	}

	public function insert_product($name, $description, $cat, $sub_cat, $old_price, $new_price, $new, $featured, $quantity, $popularity)
	{
		$sql ="INSERT INTO products (product_name, description, category, sub_category, old_price, new_price, new_product, featured_product, quantity, popularity) VALUES ('$name', '$description', '$cat', '$sub_cat', '$old_price', '$new_price', '$new', '$featured', '$quantity', '$popularity')";

		$result	= $this->db->query($sql);
		$result= $this->db->insert_id();
		return $result;
	}

	public function update_product($name, $description, $cat, $sub_cat, $old_price, $new_price, $new, $featured, $quantity, $popularity, $product_id)
	{
		$sql ="UPDATE products SET product_name = ?, description=?, category=?, sub_category=?, old_price=?, new_price=?, new_product=?, featured_product= ?, quantity= ?, popularity= ? WHERE product_id= ?";

		$result	= $this->db->query($sql,array($name, $description, $cat, $sub_cat, $old_price, $new_price, $new, $featured, $quantity, $popularity, $product_id));
		return $product_id;
	}

	public function delete_product($product_id)
	{
		$sql= "DELETE from products where product_id='$product_id'";
		$result = $this->db->query($sql);
		return $result;
	}

	public function get_pin()
	{
		$sql = "SELECT * from pin";
		$result = $this->db->query($sql);
		$data= '<table class="table">
    <thead>
      <tr><form action="'.base_url().'/admin/pincode/add" method="POST">
        <th>Pin</th>
        <th>Cost</th>
      </tr>
    </thead>
    <tbody>
    <tr><td><input type="numberic" name="pin"></td>
    <td><input type="numberic" name="cost"></td>
    <td><button class="btn-xs btn-primary">Add</button></td></tr></form>';

		foreach ($result->result() as $tuple)
		{
			$data= $data.'
			<tr><form action="'.base_url().'/admin/pincode/remove" method="POST">
			<td>'.$tuple->pincode.'</td><input type="hidden" value="'.$tuple->pincode.'" name="pin">
			<td>'.$tuple->cost.'
			<td><button type="submit" class="btn-xs btn-primary">Remove</button></td>
			</tr></form>';
		}
		$data = $data.'</tbody></table>';
		return $data;
	}

	public function add_pin($pin, $cost)
	{
		$sql= "INSERT INTO pin (pincode, cost) VALUES ($pin, $cost)";
		$result =  $this->db->query($sql);

	}

	public function remove_pin($pin)
	{
		$sql= "SET FOREIGN_KEY_CHECKS=0";
		$result =  $this->db->query($sql);

		$sql= "DELETE FROM pin where pincode='$pin'";
		$result =  $this->db->query($sql);

		$sql= "SET FOREIGN_KEY_CHECKS=1";
		$result =  $this->db->query($sql);

	}

	public function get_queries()
	{
		$sql = "SELECT * from queries order by time";
		$result = $this->db->query($sql);
		$data= '<table class="table">
    <thead>
      <tr>
        <th>Asked by</th>
        <th>Email</th>
        <th>Query</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>';

		foreach ($result->result() as $tuple)
		{
			$data= $data.'
			<tr>
			<td>'.$tuple->name.'</td>
			<td>'.$tuple->email.'</td>
			<td><textarea rows="10" disabled>'.$tuple->query.'</textarea></td>
			<td>'.$tuple->time.'</td>
			</tr>';
		}
		$data = $data.'</tbody></table>';
		return $data;
	}

	public function get_products()
	{
		$sql = "SELECT * from products order by product_id";
		$result = $this->db->query($sql);
		$data= '<table class="table">
    <thead>
      <tr>
      <th>Image</th>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>New price</th>
        <th>Old price</th>
        <th>New</th>
        <th>Featured</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Popularity</th>
      </tr>
    </thead>
    <tbody>';
    $url = base_url();

		foreach ($result->result() as $tuple)
		{
			if($tuple->new_product == 0)
				$new=  'No';
			else
				$new = 'Yes';
			if($tuple->featured_product == 0)
				$featured = 'No';
			else
				$featured = 'Yes';

			$data= $data.'
			<tr>
			<td><img src="'.$url.'/images/'.$tuple->product_id.'/a.jpg" width="100px"></td>
			<td>'.$tuple->product_id.'</td>
			<td><a href="'.base_url().'/admin/products/edit?id='.$tuple->product_id.'">'.$tuple->product_name.'</a></td>
			<td><textarea rows="10" disabled>'.$tuple->description.'</textarea></td>
			<td>'.$tuple->new_price.'</td>
			<td>'.$tuple->old_price.'</td>
			<td>'.$new.'</td>
			<td>'.$featured.'</td>
			<td>'.$tuple->quantity.'</td>
			<td>'.$tuple->category.'</td>
			<td>'.$tuple->sub_category.'</td>
			<td>'.$tuple->popularity.'</td>
			<td><a href="'.$url.'/admin/products/remove?id='.$tuple->product_id.'"><button class="btn-xs btn-primary">Remove</button></a></td>
			</tr>';
		}
		$data = $data.'</tbody></table>';
		return $data;
	}

	public function order_history()
	{
		$sql = "SELECT * from orders order by time DESC";
		$result= $this->db->query($sql);
		$data= '';
		foreach ($result->result() as $tuple) 
		{
			$result_func= $this->model_html->order_history_admin($tuple);
			$data= $data.$result_func;
		}
		return $data;
	}
	public function update_order($data)
	{

    	foreach ($data as $key => $value) 
    	{
    		// echo "<script>console.log(".$key."->".$value.")</script>";
			$sql = "UPDATE orders SET status= '$value' WHERE id= '$key'";
			$result= $this->db->query($sql);
    	}

	}
	public function get_admin()
	{
		$sql = "SELECT * from adminuser";
		$result = $this->db->query($sql);
		$data= '<table class="table">
    <thead>
      <tr><form action="'.base_url().'/admin/user/add" method="POST">
        <th>Email</th>
        <th>Added on</th>
      </tr>
    </thead>
    <tbody>
    <tr><td><input type="email" name="email" placeholder="Enter email"></td>
    <td><input type="password" name="password" placeholder="Enter Password" ></td>
    <td><button class="btn-xs btn-primary">Add</button></td></tr></form>';

		foreach ($result->result() as $tuple)
		{
			$data= $data.'
			<tr><form action="'.base_url().'/admin/user/remove" method="POST">
			<td>'.$tuple->email.'</td><input type="hidden" value="'.$tuple->email.'" name="email">
			<td>'.$tuple->time.'
			<td><button type="submit" class="btn-xs btn-primary">Remove</button></td>
			</tr></form>';
		}
		$data = $data.'</tbody></table>';
		return $data;
	}

	public function add_admin($email, $password)
	{
		$sql= "INSERT INTO adminuser (email, password) VALUES ('$email', '$password')";
		$result =  $this->db->query($sql);

	}

	public function remove_admin($email)
	{
		$sql= "DELETE FROM adminuser where email='$email'";
		$result =  $this->db->query($sql);
	}


}

?>