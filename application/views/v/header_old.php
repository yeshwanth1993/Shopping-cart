<!DOCTYPE html>
<html lang="en">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nathan Traders</title>
    <style type="text/css">
        body{
            background-image: url("<?php echo base_url();?>images/b3.png");
        }
    </style>
    <link href="<?php echo base_url();?>/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' media='screen and (max-width: 992px)' href='<?php echo base_url();?>css/medium.css' />
    <link href="<?php echo base_url();?>css/shop-homepage.css" rel="stylesheet">
    <link rel="icon" 
      type="image/png" 
      href="<?php echo base_url();?>images/myicon.png">

<script type="text/javascript">

function add_to_cart(product_id)
{
    var cart_num = null;
    $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>/nathantraders/add_cart_ajax',
        dataType: 'json',
        data: {
        product_id: product_id
        },
        success: function (response) 
        {
            // We get the element having id of display_info and put the response inside it
            cart_num = response.cart_num;
            $( "#cart_num" ).html (cart_num);
            setTimeout(function() {$('#cart_success').modal('hide');}, 1250);
        }
    });
}
</script>

</head>

<body>
<div id="loader"></div>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url();?>"><p class="menu-sty">Home</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/s/about_us"><p class="menu-sty">About Us</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/nathantraders/areas_we_serve"><p class="menu-sty">Areas We Serve</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/s/contact_us"><p class="menu-sty">Contact us</p></a>
                    </li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li> 
                        <a href="<?php echo base_url();?>/nathantraders/account"> <p class="menu-sty"><?php 
                        if(isset($_SESSION['name'])){echo 'Welcome, '.$_SESSION['name'];} 
                        else
                            {echo 'Welcome, Guest';}?> </p></a>
                    </li>
                    <li> 
                        <?php if(isset($_SESSION['name'])){echo '<a href= "'.base_url().'/nathantraders/account"> <p class="menu-sty"><span class="glyphicon glyphicon-user"> </span> Account</p></a>';} ?>
                    </li>
                    <li> 
                        <a href="<?php echo base_url(); ?>/nathantraders/cart"> <p class="menu-sty"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                        <span class="badge" id="cart_num"> 
                        <?php 
                        if(isset($_SESSION['cart']))
                        {
                        echo count($_SESSION['cart']);   
                        }
                        else{
                        echo'0';
                        }
                        ?> </span></p></a>
                    </li>
                    <li> 
                        <?php 
                            if(!isset($_SESSION['name']))
                            {
                               echo '<a href="'.base_url().'/nathantraders/login"> <p class="menu-sty">Login / Register</p></a>';
                            }
                            else
                            {
                               echo '<a href="'.base_url().'/nathantraders/Logout"> <p class="menu-sty">Logout</p></a>';
                            }
                        ?>
                    </li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container" style="background-color: #fff; padding-top: 20px; padding-bottom: 20px; box-shadow: 2px 4px 3px 1px rgba(0, 0, 0, 0.2); margin-top: -20px">
    <div class="row">
        <div class="col-md-3">
        <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url();?>images/logo.png" class="img-responsive"> </a>
        </div>
        
            <form action="<?php echo base_url();?>/nathantraders/search" method= "GET">
                <div class="form-group">
                <div class="col-md-5"> 
                    <input type="text" style="display: inline;" class="form-control" id="title1" name="search" type="text" value="" placeholder="Search Products"> </div>
                    <div class="col-md-3"> 
                    <button type="submit" style="display: inline;" class="btn btn-default fix-height">Search</button> </div>
                </div>
                
            </form>
        </div>
    </div>
 
     <br> <br>
</body>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id = "cart_success" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    
      <div class="modal-body">
     
      <H2 class="text-center">Success!</H2>
      <h4 class="text-center">Item Added to cart</h4>
     
      </div>
    </div>
  </div>
</div>

</html>