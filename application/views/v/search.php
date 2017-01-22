
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/catagories');
        ?>

            <div class="col-md-9"> 

                <div class="row">
                <p class="lead" style="display: inline;">
                <?php
                if(!isset($sub_heading))
                    echo $heading;
                else
                    echo $heading.' / '.$sub_heading; ?> 
                </p>

                <?php
                    if(isset($search))
                        echo'<form style="display: inline; float: right;" action="'.base_url().'/nathantraders/search" method="GET">
                                <input type="hidden" value="'.$search.'" name="search">';
                    else 
                    {
                        if(isset($sub_heading)) 
                            echo'<form style="display: inline; float: right;" action="'.base_url().'/nathantraders/category" method="GET">
                                <input type="hidden" value="'.$heading.'" name="sub_category"><input type="hidden" value="'.$sub_heading.'" name="sub_category">';
                        else
                            echo'<form style="display: inline; float: right;" action="'.base_url().'/nathantraders/category" method="GET">
                            <input type="hidden" value="'.$heading.'" name="category">';
                    }
                ?>

                        <select name="sort" onchange="this.form.submit();">
                        <?php 
                        if (isset($sort))
                        {
                            if($sort==0)
                            echo '<option value="0" selected="selected">Popularity</option>
                            <option value="1">Price: Low to High</option>
                            <option value="2">Price: High to Low</option>';
                            if($sort==1)
                            echo '<option value="0" selected="selected">Popularity</option>
                            <option value="1" selected="selected">Price: Low to High</option>
                            <option value="2">Price: High to Low</option>';
                            if($sort==2)
                            echo '<option value="0" >Popularity</option>
                            <option value="1">Price: Low to High</option>
                            <option value="2" selected="selected">Price: High to Low</option>';
                        }

                        else
                            echo '<option value="0" selected="selected">Popularity</option>
                            <option value="1">Price: Low to High</option>
                            <option value="2">Price: High to Low</option>'; 
                        ?>
                        </select>
                    </form><p style="display: inline; float: right;">Sort By: &nbsp</p>
                </div>
                <div class="row"> 
                <?php echo $search_products; ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
