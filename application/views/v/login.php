<div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">
    <div class="row">
        <?php
        $this->load->view('v/side/login_side');
        ?>
        
        <div class="col-md-9">
            <div class="row">
                <form action="<?php echo base_url();?>/nathantraders/login_try" method="POST">
                    <div class="form-group">
                        <p class="lead"><strong>Login</strong> </p>
                        <div class="row">
                        <div class="col-md-2"> <strong> Email:</strong> </div>
                        <div class="col-md-4"> <input type="text" class="form-control" name="email"> </div></div> <br>
                        <div class="row">
                        <div class="col-md-2"> <strong> Password:</strong></div>
                        <div class="col-md-4"> <input type="Password" class="form-control" name="password"> </div></div><br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary">Login</button>  or  
                        <a href="<?php echo base_url();?>/nathantraders/signup">
                        Sign Up</a></div>
                        <?php if(isset($signup_sucess)){echo $signup_sucess;} ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>