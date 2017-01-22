<div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">
<div class="row">
<?php
	$this->load->view('v/side/catagories');
?>
<div class="col-md-9">
<div class="row">
<div class="col-sm-6 col-lg-6 col-md-6" >
<div class="row carousel-holder">
<div class="col-md-12">
<div id="carousel-example-generic" class="carousel slide caro" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example-generic" data-slide-to="1"></li>
<li data-target="#carousel-example-generic" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" >
<div class="item active">
<img class="slide-image" src="<?php echo base_url().'/images/'.$id.'/a.jpg'; ?>" alt="" data-toggle="modal" data-target="#myModal1">
</div>
<div class="item">
<img class="slide-image" src="<?php echo base_url().'/images/'.$id.'/b.jpg'; ?>" alt="" data-toggle="modal" data-target="#myModal2">
</div>
</div>
<a class="left carousel-control-product"  href="#carousel-example-generic" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" style="color:#0084b4;"></span>
</a>
<a class="right carousel-control-product" style="color:#0084b4;" href="#carousel-example-generic" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>
</div>
</div> 
<br> <br> <br>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="myModalLabel">Zoom View</h4>
</div>
<div class="modal-body">
<img class="img-responsive" src="<?php echo base_url().'/images/'.$id.'/a.jpg'; ?>">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="myModalLabel">Zoom View</h4>
</div>
<div class="modal-body">
<img class="img-responsive" src="<?php echo base_url().'/images/'.$id.'/b.jpg'; ?>">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="col-xs-9 col-md-6">                    
<div class="row">
<div class="row">
<div class="col-md-12">
<p style="color: #3b5998; font-size: 30px; margin-top: 0;"><?php echo $name.' '.$quantity.'Kgs'; ?></p>
</div>
</div><!-- end row -->

<div class="row">
<div class="col-md-12">
<h4>
Catagory: <span class="label label-primary"><?php echo $category; ?></span> 
<span class="label label-primary"><?php echo $sub_category; ?></span>
</h4>
</div>
</div><!-- end row -->

<div class="row">
<div class="col-md-12 bottom-rule"> <br> 
<h3 class="product-price" style="display: inline;">₹ <?php echo $new_price; ?></h3>
<p style="font-size: 16px; color:#764035; margin:0px; display: inline;"><s>₹ <?php echo $old_price; ?></s></p></strong>
</div>
</div><!-- end row -->
<br> 

<div class="row add-to-cart">
<div class="col-md-3 product-qty">
<div class="col-xs-2 vcenter">
<form class="" action="<?php echo base_url();?>/nathantraders/add_cart" method="POST">
<h4> Qty: </h4> 
</div>

<div class="col-xs-3 vcenter" >
<select name="quantity">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
</select>
</div>
</div>

<div class="col-md-4">
<input type="hidden" name="product_id" value="<?php echo $id; ?>">
<button type="submit" name="product_submit" class="btn btn-primary">
Add to Cart
</button> </form>
</div>
</div><!-- end row --> <br> <br> <br>

<div class="container-fluid" style="padding-left: 0px;">

<div class="panel panel-default">
<div class="panel-heading">Product Description</div>
<div class="panel-body">
<?php echo $description; ?> 
</div> 
</div>
</div>

</div>
</div>
</div><br>


<p class="lead">Similar Products</p>
<div class="row">

<?php echo $similar_products; ?>
</div>

</div>
</div>

</div>
