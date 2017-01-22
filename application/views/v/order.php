
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/account_side');
        ?>

            <div class="col-md-9">
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                            </div>
                            <div class="col-xs-6">
                                <a href="<?php echo base_url(); ?>">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                <form>

                <?php echo $view_cart; ?>

                    <div class="row">
                        <div class="text-center">
                            <div class="col-xs-8">
                                <h6 class="text-right">Added items?</h6>
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-default btn-sm">
                                    Update cart
                                </button> 
                            </div>
                        </div>
                    </div> 
                </form>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-8">
                            <h4 class="text-right">Total <strong>₹<?php echo $total_cart; ?></strong></h4>
                        </div>
                        <div class="col-xs-2">
                            <a href="<?php echo base_url(); ?>/nathantraders/checkout">
                            <button type="button" class="btn btn-success ">
                                Checkout
                            </button> </a>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
                
            </div>
        </div>

</div>
    <!-- /.container -->
