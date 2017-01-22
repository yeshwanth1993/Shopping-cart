    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/account_side');
        ?>

            <div class="col-md-9">
            <div class="row">
            <?php echo form_open('/nathantraders/change_details_submit'); ?>
                <form action= '<?php echo base_url(); ?>/nathantraders/change_details_submit' method='POST'>
                    <div class="form-group">
                        <p class="lead"><strong>Change Account details</strong> </p>
                        <div class="row">
                        <div class="col-md-12"> <strong> Email: &nbsp <?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?></strong></div></div> <br>

                        <div class="row">
                        <div class="col-md-2"> <strong> Phone:</strong></div>
                        <div class="col-md-4"> <input value="<?php if(isset($phone)){echo $phone;}?>" type="tel" class="form-control" name="ph" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Address:</strong></div>
                        <div class="col-md-6"><textarea cols="30" name="address" rows="3" required><?php if(isset($add)){echo $add;}?></textarea> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Pincode:</strong></div>
                        <div class="col-md-4"> <input value="<?php if(isset($pin)){echo $pin;}?>" type="text" class="form-control" name="pin" required> </div></div><br>
                        <div class="text-center"> 
                        <button class="btn btn-primary" type="submit">Change details</button></div>
                    </div>
                </form>
                <p style="color:red;"> <?php echo validation_errors(); ?> <?php if(isset($message)){echo $message;} ?> </p>
            </div>
            </div>
            <div class="col-md-9">
             
             </div>
             <br> <br>
        </div>

</div>
    <!-- /.container -->

