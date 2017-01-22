<script type="text/javascript">

function loaddata()
{
    var pin= document.getElementById( 'pin' ).value;
    if (pin<100000) 
    {
        $('#myModal_wrong').modal('show');
        return;
    }
    if (isNaN(pin)) 
    {
        $('#myModal_wrong').modal('show');
        return;
    }
    var total_cost =null;
    var dil_cost =null;
    $.ajax({
        type: 'post',
        url: 'check_dil_crg',
        dataType: 'json',
        data: {
        pincode: pin
        },
        success: function (response) 
        {
            total_cost = response.grand_cost;
            dil_cost = response.dil_cost;
            $( "#display_total" ).html (total_cost);

            if(dil_cost)
            {
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
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/catagories');
        ?>

            <div class="col-md-9">
            <p class="lead"><strong>Areas we serve</strong></p>
            <p>Enter your Pin code to find out whether we serve in your area.</p>
            <div class="container-fuild">
            <div class="col-xs-3">
            <input type="text" name="pin" class="form-control" id="pin" maxlength="6"></div>
            <div class="col-xs-3">
            <button type="button" onclick="loaddata();" class="btn btn-primary">Check</button> </div>
            </div>
                
            </div>
        </div>

</div>
    <!-- /.container -->

    <!-- Modal failure-->
<div class="modal fade" id="myModal_fail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Information</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
    Sorry, we currently do not serve in your area.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

    <!-- Modal failure-->
<div class="modal fade" id="myModal_wrong" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delivery Information</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
    Please enter a valid Pincode.
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
