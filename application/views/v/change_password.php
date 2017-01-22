    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/account_side');
        ?>

            <div class="col-md-9">
            <div class="row">
            <?php echo form_open('/nathantraders/change_password_submit'); ?>
                <form action= '<?php echo base_url(); ?>/nathantraders/change_password_submit' method='POST'>
                    <div class="form-group">
                        <p class="lead"><strong>Change Password</strong> </p>
                        <div class="row">
                        <div class="col-md-2"> <strong> Current Password:</strong></div>
                        <div class="col-md-4"> <input type="Password" class="form-control" name="password" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> New Password:</strong></div>
                        <div class="col-md-4"> <input type="Password" class="form-control" name="new_password" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Re-enter New Password:</strong></div>
                        <div class="col-md-4"> <input type="Password" class="form-control" name="new_password_1" required> </div></div><br>
                        <div class="text-center"> 
                        <button class="btn btn-primary" type="submit">Change password</button></div>
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

