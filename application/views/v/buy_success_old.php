
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
                                <h5>Order Placed Sucessfully.</h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel-body">
                Your Oder id is:
                <?php echo $order_id; ?>. <br> <br> We will send a processing E-mail as soon as we are done with the processing. Please see the Order history page to see the status of your order. 
                <br> <br>
                <p>If you have signed in as a guest, we will send you the details of where your order will be shipped from through E-mail and you can contact that particular branch to know the status. </p>
                </div>

            </div>
        
    </div>
</div>
                
            </div>
        </div>

</div>
    <!-- /.container -->
