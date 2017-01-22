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
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>font/css/font-awesome.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link rel='stylesheet' media='screen and (max-width: 992px)' href='<?php echo base_url();?>css/medium.css' />
    <link href="<?php echo base_url();?>css/shop-homepage.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/footer.css" rel="stylesheet">

    <script src="<?php echo base_url();?>js/jquery.js"></script>    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>


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
                        <a href="<?php echo base_url();?>/admin/queries"><p class="menu-sty">Queries</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/admin/orders"><p class="menu-sty">Orders</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/admin/products"><p class="menu-sty">Products</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/admin/products/add"><p class="menu-sty">Add Products</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/admin/pincode"><p class="menu-sty">Pincodes</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/admin/user"><p class="menu-sty">Admins</p></a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>/admin/user/delete_cache"><p class="menu-sty">Clear cache</p></a>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li> 
                        <a href="<?php echo base_url();?>/nathantraders/account"> <p class="menu-sty"><?php 
                        if(isset($_SESSION['name'])){echo 'Welcome, '.$_SESSION['name'];} ?> </p></a>
                    </li>

                    <li> 
                        <?php 
                            if(!isset($_SESSION['email']))
                            {
                               echo '<a href="'.base_url().'/admin"> <p class="menu-sty">Login / Register</p></a>';
                            }
                            else
                            {
                               echo '<a href="'.base_url().'/admin/nathantraders/Logout"> <p class="menu-sty">Logout</p></a>';
                            }
                        ?>
                    </li>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

     <br> <br>
</body>
</html>