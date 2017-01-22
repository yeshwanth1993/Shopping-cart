<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_html extends CI_Model 
{
	function __construct () {
		$this->load->database();
		parent::__construct();
	}

    public function cart_display($tuple, $quantity)
    {
                    $data = '<div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="'.base_url().'images/'.$tuple->product_id.'/a.jpg">
                        </div>
                        <div class="col-xs-4">
                           <a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                            <h4 class="product-name"><strong>'.$tuple->product_name.'</strong></h4></a><h4><small>Bag Size: '.$tuple->quantity.' Kgs</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>₹ '.$tuple->new_price.'<span class="text-muted"> X</span></strong></h6>
                            </div>
                            <div class="col-xs-3">
                                <input type="text" class="form-control input-sm" value="'.$quantity.'" name="'.$tuple->product_id.'" onchange="update_cart('.$tuple->product_id.');" id="'.$tuple->product_id.'">
                            </div>
                            <div class="col-xs-2">
                                <a href= "'.base_url().'/nathantraders/remove_cart?product_id='.$tuple->product_id.'" ><button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button></a>
                            </div>
                        </div>
                    </div><hr>';
                    return $data;

    }
    public function cart_display_order_his($tuple, $quantity)
    {
                    $data = '<div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="'.base_url().'images/'.$tuple->product_id.'/a.jpg">
                        </div>
                        <div class="col-xs-4">
                           <a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                            <h4 class="product-name"><strong>'.$tuple->product_name.'</strong></h4></a><h4><small>Bag Size: '.$tuple->quantity.' Kgs</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>Quantity:<span class="text-muted"> '.$quantity.'</span></strong></h6>
                            </div>

                        </div>
                    </div>';
                    return $data;

    }
    public function cart_display_email($tuple, $quantity)
    {
                    $data = '<div class="row">
                        <div class="col-xs-4">
                           <a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                            <h4 class="product-name"><strong>'.$tuple->product_name.'</strong></h4></a>
                            <h4><small>Bag Size: '.$tuple->quantity.' Kgs</small></h4>
                            <h4><small>Quantity: '.$quantity.' Bags</small></h4>
                        </div>
                    </div><hr>';
                    return $data;

    }
    public function cart_display_chk($tuple, $quantity)
    {
                    $data = '<div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="'.base_url().'images/'.$tuple->product_id.'/a.jpg">
                        </div>
                        <div class="col-xs-4">
                           <a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                            <h4 class="product-name"><strong>'.$tuple->product_name.'</strong></h4></a><h4><small>Bag Size: '.$tuple->quantity.' Kgs</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-12 text-right">
                                <h4><strong>₹ '.$tuple->new_price.' X '.$quantity.'<span class="text-muted"></span></strong></h4>


                                <a href= "'.base_url().'/nathantraders/remove_cart?product_id='.$tuple->product_id.'" >Remove</a>
                            </div>
                        </div>
                    </div><hr>';
                    return $data;

    }

    public function order_history($tuple)
    {
        if($tuple->status == 0)
            $status = Array('active', 'disabled', 'disabled', 'disabled');
        elseif($tuple->status == 1)
            $status = Array('complete', 'active', 'disabled', 'disabled');
        elseif($tuple->status == 2)
            $status = Array('complete', 'complete', 'active', 'disabled');
        elseif($tuple->status == 3)
            $status = Array('complete', 'complete', 'complete', 'complete');

        $date= date('M j Y g:i A', strtotime($tuple->time));
        $data = '<div class="row">
            <div class="col-xs-12">
                <h3 style="display:inline">Order ID:'.$tuple->id.'</h3>
                <p style="display:inline">Ordered on: '.$date.'</p> 
             <br> <br> 
             <div class="container-fluid">
            <div class="row bs-wizard" style="border-bottom:0;">
                <div class="col-xs-3 bs-wizard-step '.$status[0].'">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Processing</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$status[1].'">
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Packing</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$status[2].'">
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Out for Delivery</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$status[3].'">
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Complete</div>
                </div>
            </div>

    </div> </div> <!--This is end of timeline -->';

    $cart = json_decode($tuple->items);
    $product_view= $this->model_cart->view_cart_order_his($cart);
    $data= $data.$product_view;

    $data= $data.'<div class="row container-fluid text-center"> 
    <div class="col-xs-6">
        <h5><strong>Shipping address:</strong><br> '.$tuple->address.'<br> <strong>Pincode:</strong>'.$tuple->pincode.'<br> <strong>Phone:</strong>'.$tuple->phone.'<br><strong>Name:</strong>'.$tuple->name.'<br><strong>Email:</strong>'.$tuple->email.'</h5>
    </div>
    <div class="col-xs-6">
    <h4 class="text-center">Total Price: ₹ '.$tuple->cost.'</h4>
    </div>

    </div>
    </div><hr>';
    return $data;

    }

	public function search_results_display($tuple)
	{
		if ($tuple->new_product == 1)
		{
		$data = '<div class="col-sm-5 col-lg-4 col-md-5">
                      	  <div class="thumbnail sig-pro">
                      		  	<a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                        		<div class= "row">
                        		<div class="col-xs-2 col-lg-2 col-md-2">
                        			<img src="'.base_url().'images/new.png"  class= "img-responsive img-circle"style= "position:absolute"; alt="">
                        	 	</div> </div>
                            	<img src="'.base_url().'images/'.$tuple->product_id.'/a.jpg" alt="">
                            	<div class="caption">
                                <h4 class="text-center" style="margin-top: 0px; margin-bottom:5px;"><a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                                '.$tuple->product_name.'-'.$tuple->quantity.'Kgs</a>
                                </h4>
                                <p class="text-center" style="color:green; font-size:16px; margin-bottom:0px;"><strong>New Price: ₹ '.$tuple->new_price.'</strong></p>
                                <p class="text-center" style="color:#764035; margin:0px;"><s>Old Price: Rs.'.$tuple->old_price.'</s></p>
                                	<div class="text-center">
                                		<button type= "button" data-toggle="modal" data-target="#cart_success" onclick="add_to_cart('.$tuple->product_id.');" class="btn btn-primary">Add to cart</button>
                                	</div>
                            </div></div></div>';
            }

            else
            {
			$data = '<div class="col-sm-5 col-lg-4 col-md-5">
                      	  <div class="thumbnail sig-pro">
                      		  	<a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                      		  	<div class="row">
                        		<div class="col-xs-2 col-lg-2 col-md-2">
                        	 	</div> </div>
                            	<img src="'.base_url().'images/'.$tuple->product_id.'/a.jpg" alt="">
                            	<div class="caption">
                                <h4 class="text-center" style="margin-top: 0px; margin-bottom:5px;"><a href="'.base_url().'/nathantraders/product?product_id='.$tuple->product_id.'">
                                '.$tuple->product_name.'-'.$tuple->quantity.'Kgs</a>
                                </h4>
                                <p class="text-center" style="color:green; font-size:16px; margin-bottom:0px;"><strong>New Price: Rs.'.$tuple->new_price.'</strong></p>
                                <p class="text-center" style="color:#764035; margin:0px;"><s>Old Price: Rs.'.$tuple->old_price.'</s></p>
                                	<div class="text-center">
                                		<button type= "button" data-toggle="modal" data-target="#cart_success" onclick="add_to_cart('.$tuple->product_id.');" class="btn btn-primary">Add to cart</button>
                                	</div>
                            </div></div></div>';
			}
			return $data;
	}

    public function order_history_admin($tuple)
    {
        if($tuple->status == 0)
        {
            $status = Array('active', 'disabled', 'disabled', 'disabled');
            $selected=Array('selected', '', '', '');
        }
        elseif($tuple->status == 1)
        {
            $status = Array('complete', 'active', 'disabled', 'disabled');
            $selected=Array('', 'selected', '', '');
        }
        elseif($tuple->status == 2)
        {
            $status = Array('complete', 'complete', 'active', 'disabled');
            $selected=Array('', '', 'selected', '');
        }
        elseif($tuple->status == 3)
        {
            $status = Array('complete', 'complete', 'complete', 'complete');
            $selected=Array('', '', '', 'selected');
        }

        $date= date('M j Y g:i A', strtotime($tuple->time));
        $data = '<div class="row">
            <div class="col-xs-12">
                <h3 style="display:inline">Order ID:'.$tuple->id.'</h3>
                <p style="display:inline">Ordered on: '.$date.'</p> 
             <br> <br> 
             <div class="container-fluid">
            <div class="row bs-wizard" style="border-bottom:0;">
                <div class="col-xs-3 bs-wizard-step '.$status[0].'">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Processing</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$status[1].'">
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Packing</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$status[2].'">
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Out for Delivery</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$status[3].'">
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Complete</div>
                </div>
            </div>

    </div> </div> <!--This is end of timeline -->';

    $cart = json_decode($tuple->items);
    $product_view= $this->model_cart->view_cart_order_his($cart);
    $data= $data.$product_view;

    $data= $data.'<div class="row container-fluid text-center"> 
    <div class="col-xs-6">
        <h5><strong>Shipping address:</strong><br> '.$tuple->address.'<br> <strong>Pincode:</strong>'.$tuple->pincode.'<br> <strong>Phone:</strong>'.$tuple->phone.'<br><strong>Name:</strong>'.$tuple->name.'<br><strong>Email:</strong>'.$tuple->email.'</h5>
    </div>
    <div class="col-xs-6">
    <h4 class="text-center">Total Price: ₹ '.$tuple->cost.'</h4>
    <h4 class="text-center">Update status:</h4>
    <select name="'.$tuple->id.'">
    <option '.$selected[0].' value="0">Processing</option>
    <option '.$selected[1].' value="1">Packing</option>
    <option '.$selected[2].' value="2">Delivery</option>
    <option '.$selected[3].' value="3">Complete</option>
    </select>
    <button class="btn-xs btn-primary" type="submit">Update</button>
    </div>

    </div>
    </div><hr>';
    return $data;

    }

}

?>