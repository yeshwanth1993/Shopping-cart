
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/catagories');
        ?>

            <div class="col-md-9">
            <div class="row">
            <div class="col-md-12"><p class="lead"><strong>Contact Us</strong></p></div>
                <div class="col-md-3">
                
                    <h4><strong>Ayanavaram Branch</strong></h4>
                    <p>Nathan traders<br>
                    427/171, K.H road,
                    Ayanavaram.
                    chennai-600023.
                    Contact - 9600051050
                     </p>
                </div>
                <div class="col-md-3">
                    <h4><strong>Ambattur Branch</strong></h4>
                    <p>Nathan traders<br>
                        273,M.T.H road,
                        Venkatapuram,
                        Ambattur,
                        Chennai-600053.
                        Contact - 9600066633
                     </p>
                </div>
                <div class="col-md-3">
                    <h4><strong>Vadapalani Branch</strong></h4>
                    <p>Nathan traders<br>
                        49/15, Duraisamy road,
                        Vadapalani,
                        Chennai-600026.
                        Contact - 9600051051

                     </p>
                </div>
                <div class="col-md-3">
                    <h4><strong>Parrys Branch</strong></h4>
                    <p>Nathan traders<br>
                        18,18/1, Acharappan street,
                        Parrys,
                        Chennai-600001.
                        Contact - 9600051052

                     </p><br><br>
                </div>
            </div>

            <form action="<?php echo base_url();?>/s/contact_us_mail" method="POST">
            <div class="form-group">
                <p class="lead"><strong>Contact form</strong> </p>
                <div class="row">
                <div class="col-md-2"> <strong> Name: </strong> </div>
                <div class="col-md-6"> <input type="text" class="form-control" name="name" required> </div></div> <br>
                <div class="row">
                <div class="col-md-2"> <strong> Your E-mail: </strong></div>
                <div class="col-md-6"> <input type="E-mail" class="form-control" name="email" required> </div></div><br>
                <div class="row">
                <div class="col-md-2"> <strong> Query: </strong></div>
                <div class="col-md-6"> <textarea class="form-control" name="message" rows="5" required></textarea> </div></div><br>
                <button type= "submit" class="btn btn-primary">Submit</button></div>
            </div>
            </form>
                


            </div>
        </div>

</div>
    <!-- /.container -->
