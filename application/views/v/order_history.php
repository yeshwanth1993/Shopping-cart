
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        if(isset($_SESSION['name']))
        {
        $this->load->view('v/side/account_side');
        echo '<div class="col-md-9">';
        }
        else
            echo '<div class="col-md-12">';
        
        ?>

            
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Order History.</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                <?php echo $order_history; ?>

                </div>

            </div>
        
    </div>
</div>
                
            </div>
        </div>

</div>
    <!-- /.container -->
