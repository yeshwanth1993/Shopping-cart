<div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">
    <div class="row">
        <?php
        $this->load->view('v/side/signup_side');
        ?>
        <div class="col-md-9">
            <div class="row">
            <?php echo form_open('/nathantraders/signup_try'); ?>
                <form action= '<?php echo base_url(); ?>/nathantraders/signup_try' method='POST'>
                    <div class="form-group">
                        <p class="lead"><strong>Sign Up</strong> </p>
                        <div class="row">
                        <div class="col-md-2"> <strong> Name:</strong> </div>
                        <div class="col-md-4"> <input type="text" required class="form-control" name="name"> </div></div> <br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Email:</strong> </div>
                        <div class="col-md-4"> <input type="email" class="form-control" name="email" required> </div></div> <br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Password:</strong></div>
                        <div class="col-md-4"> <input type="Password" class="form-control" name="password" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Re-enter Password:</strong></div>
                        <div class="col-md-4"> <input type="Password" class="form-control" name="password_1" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Phone:</strong></div>
                        <div class="col-md-4"> <input type="tel" class="form-control" name="ph" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Address:</strong></div>
                        <div class="col-md-4"> <input type="text" class="form-control" name="add" required> </div></div><br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Pincode:</strong></div>
                        <div class="col-md-4"> <input type="text" class="form-control" name="pin" required> </div></div><br>
                        <?php if(isset($signup_fail)){echo $signup_fail;} ?>
                        <?php echo validation_errors(); ?>


                        <div class="text-center"> 
                        <button class="btn btn-primary" type="submit">Sign Up</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>