<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product extends CI_Model 
{
	function __construct () {
		$this->load->database();
		parent::__construct();
	}

	public function product_details($id)
	{	
		$sql= "SELECT * FROM products where product_id='$id'";
		$result	= $this->db->query($sql);
		foreach ($result->result() as $tuple)
		{
			 $data = Array ('id' => $tuple->product_id, 'name' => $tuple->product_name, 'description'=> $tuple->description,'catagory' => $tuple->category, 'old_price' => $tuple->old_price, 'new_price'=> $tuple->new_price, 'quantity' => $tuple->quantity, 'category' => $tuple->category,'sub_category' => $tuple->sub_category );
		}

		return $data;
	}

	public function featured_products()
	{	
		$sql= "SELECT * FROM products where featured_product='1'";
		$result	= $this->db->query($sql);
		$data= '';
		foreach ($result->result() as $tuple)
		{
			$result_func= $this->model_html->search_results_display($tuple);
			$data= $data.$result_func;
		}

		return $data;
	}

	public function similar_products($category, $sub_category, $id)
	{	
		$sql_sub= "SELECT * FROM products where category='$sub_category' ORDER BY featured_product, popularity DESC";
		$result_sub	= $this->db->query($sql_sub);
		$data= '';
		$count = 0;
		foreach ($result_sub->result() as $tuple)
		{
			if ($tuple->product_id == $id)
				continue;
			if($count>5)
				break;
			$result_func= $this->model_html->search_results_display($tuple);
			$data= $data.$result_func;
			$count = $count +1;
		}

		if ($count < 6)
		{
			$sql= "SELECT * FROM products where category='$category' ORDER BY featured_product, popularity DESC";
			$result	= $this->db->query($sql);
			foreach ($result->result() as $tuple)
			{
				if ($tuple->product_id == $id)
					continue;
				if($count>5)
					break;
				$result_func= $this->model_html->search_results_display($tuple);
				$data= $data.$result_func;
				$count = $count +1;
			}
		}


		return $data;
	}

	public function all_products()
	{	
		$sql= "SELECT * FROM products ORDER BY popularity DESC";
		$result	= $this->db->query($sql);
		$data= '';
		foreach ($result->result() as $tuple)
		{
			$result_func= $this->model_html->search_results_display($tuple);
			$data= $data.$result_func;
        }
    	
    return $data;
    }

	public function category($cat, $sub_cat, $sort)
	{	
		if($cat== 'All Products')
		{
			if($sort==1)
				$sql= "SELECT * FROM products ORDER BY new_price ASC";
			elseif($sort==2)
				$sql= "SELECT * FROM products ORDER BY new_price DESC";
			else
				$sql= "SELECT * FROM products ORDER BY popularity";	
		}
		else
		{
			if (!$sort)
			{
				if (!$sub_cat)
					$sql= "SELECT * FROM products where  category = '$cat' ORDER BY popularity DESC";
				else
					$sql= "SELECT * FROM products where  category = '$cat' and sub_category = '$sub_cat' ORDER BY popularity DESC";
			}
			else
			{
				if ($sort == 1)
				{
					if (!$sub_cat)
						$sql= "SELECT * FROM products where  category = '$cat' ORDER BY new_price ASC";
					else
						$sql= "SELECT * FROM products where  category = '$cat' and sub_category = '$sub_cat' ORDER BY new_price ASC";
				}
				elseif($sort== 2)
				{
					if (!$sub_cat)
						$sql= "SELECT * FROM products where  category = '$cat' ORDER BY new_price DESC";
					else
						$sql= "SELECT * FROM products where  category = '$cat' and sub_category = '$sub_cat' ORDER BY new_price DESC";
				}
				elseif($sort== 0)
				{
					if (!$sub_cat)
						$sql= "SELECT * FROM products where  category = '$cat' ORDER BY popularity";
					else
						$sql= "SELECT * FROM products where  category = '$cat' and sub_category = '$sub_cat' ORDER BY popularity";
				}
			}
		}
		$result	= $this->db->query($sql);
		$data= '';
		foreach ($result->result() as $tuple)
		{
			$result_func= $this->model_html->search_results_display($tuple);
			$data= $data.$result_func;
        }
    	
    return $data;
    }

    public function search_products($query, $sort)
	{	

		if(!$sort)
			$sql= "SELECT * FROM products where product_name like '%$query%' ORDER BY popularity DESC";
		else
		{
			if($sort==1)
				$sql= "SELECT * FROM products where product_name like '%$query%' ORDER BY new_price ASC";
			else
				$sql= "SELECT * FROM products where product_name like '%$query%' ORDER BY new_price DESC";				
		}

		$result	= $this->db->query($sql);
		$data= '';
		foreach ($result->result() as $tuple)
		{
			$result_func= $this->model_html->search_results_display($tuple);
			$data= $data.$result_func;
		}

		return $data;
	}


}
