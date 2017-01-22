
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">
        <?php
        $this->load->view('v/side/catagories');
        ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="<?php echo base_url();?>images/rice1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?php echo base_url();?>images/rice2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?php echo base_url();?>images/rice3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div> 

                <div class="row">
                <p class="lead">Most Popular products</p>
                <?php echo $featured_products; ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
