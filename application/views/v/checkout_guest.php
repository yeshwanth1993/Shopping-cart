<style type="text/css">
    
.panel-body-categories { padding:0px; }
.panel-body-categories table tr td { padding-left: 15px }
.panel-body-categories .table {margin-bottom: 0px; }
</style>
<script type="text/javascript">

function loaddata()
{
    var pin= document.getElementById( 'pin' ).value;
    var phone= document.getElementById( 'phone' ).value;
    var address= document.getElementById( 'address' ).value;
     var email= document.getElementById( 'email' ).value;

    var total_cost =null;
    var dil_cost =null;
    $.ajax({
        type: 'post',
        url: '<?php echo base_url();?>/nathantraders/check_dil_crg_all_g',
        dataType: 'json',
        data: {
        pincode: pin,
        phone: phone,
        address: address,
         email: email
        },
        success: function (response) 
        {
            // We get the element having id of display_info and put the response inside it
            total_cost = response.grand_cost;
            dil_cost = response.dil_cost;
            details_filled = response.details_filled;
            $( "#display_total" ).html (total_cost);

            if (!details_filled)
            {
                $('#myModal_fail_details').modal('show');
                return;
            }


            if(dil_cost)
            {
                $( "#display_dil_cost" ).html (dil_cost);
                $('#myModal_sucess').modal('show');
                $( "#model_dil" ).html (dil_cost);
            }
            else
            {
                $('#myModal_fail').modal('show');
            }
        }
    });
}
</script>

<form action="<?php echo base_url(); ?>/nathantraders/buy" method="POST"> 

<div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

<div class="row">

<div class="col-md-12 col-lg-12 col-xs-12">
    <p class="lead">Check Out</p>

<div class="container-fluid">

    <div class="row">
        
            <div class="panel-group" id="accordion">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Step 1: Billing Details</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body-categories">
                            <table class="table">
                                <tr>
                                    <td> <label>Name:</label> </td>
                                    <td><input type="text" name="name"  value="<?php if(isset($name)){echo $name;}?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Email:</label> </td>
                                    <td><input type="email" name="email" id="email"  value="">
                                    </td>
                                </tr>


                                <tr>
                                    <td> <label>Shipping address:</label></td>
                                    <td>
                                    <textarea name="address" rows="3" id="address" required><?php if(isset($add)){echo $add;}?></textarea>
                                    </td>
                                </tr>
                                <td> <label>Pin Code:</label> </td>
                                    <td>
                                    <input type="text" name="pincode" id="pin" value="<?php if(isset($pin)){echo $pin;}?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Phone Number:</label> </td>
                                    <td><input type="tel" name="phone" id="phone" value="<?php if(isset($phone)){echo $phone;}?>" required>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <button class="btn btn-primary" type="button" onclick= "loaddata();" >Next</button>
                                  </td>
                                </tr>

                                
                            </table>
                        </div>
                    </div>
                </div>

<!-- Modal failure-->
<div class="modal fade" id="myModal_fail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Charge</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
    Sorry We currently do not serve in your area. To find out all the areas we serve, Check out the areas we serve page.
      </div>
      <div class="modal-footer">
      <a href="<?php echo base_url(); ?>/nathantraders/areas_we_serve">
      <button type="button" class="btn btn-primary" >Areas we Serve</button> </a>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- Modal failure other-->
<div class="modal fade" id="myModal_fail_details" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fill out the form</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
    Please fill out all the details in the form.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>



<!-- Modal sucess-->
<div class="modal fade" id="myModal_sucess" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Charge</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        The delivery Charge for your area is ₹ <p style="display:inline;" id="model_dil"></p>
      </div>
      <div class="modal-footer">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Next</button> </a>

      </div>
    </div>
  </div>
</div>




                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Step 2: Review Order</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body-categories">
                            <table class="table">
                                <tr>
<div class="container-fluid">
    <div class="row">
            <div class="panel panel-default ">

                <div class="panel-body">
                
                <?php echo $view_cart; ?>
                    
                    <div class="row">
                        <div class="col-xs-10">
                        <h4 class="text-right">Delivery Charge: ₹<strong id="display_dil_cost"></strong></h4>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-10">
                            <h4 class="text-right">Total: ₹<strong id="display_total"></strong></h4>

                        </div>
                        <div class="col-xs-2">

                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> <button type="button" class="btn btn-primary" >
                                Next
                            </button> </a>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Step 3: Payment Method</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body-categories">
                            <table class="table">
                                <tr>
                                    <td><label>Cash On Delivery</label>
                                        <input type="radio" checked="checked" name="">
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                   <button type="submit" class="btn btn-primary">Confirm Order</button>
                                  </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        

    </div>
</div>


    
</div></div> </div> </form>