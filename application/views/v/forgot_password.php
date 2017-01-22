<script type="text/javascript">

function loaddata()
{
    var email= document.getElementById( 'email' ).value;
    var status =null;

    $.ajax({
        type: 'post',
        url: 'password_reset',
        dataType: 'json',
        data: {
        email: email
        },
        success: function (response) 
        {
            // We get the element having id of display_info and put the response inside it
            status = response.status;

            if(status)
                $('#myModal_sucess').modal('show');
            else
                $('#myModal_fail').modal('show');
        }
    });
}
</script>
    <!-- Page Content -->
    <div class="container" style="background-color: #fff; padding-top: 20px; box-shadow: 0px 4px 6px 3px rgba(0, 0, 0, 0.2);">

        <div class="row">

        <?php
        $this->load->view('v/side/login_side');
        ?>

            <div class="col-md-9">
            <p class="lead"><strong>Forgot Password?</strong></p>
            <p>Enter your Email here, and check your email to access your password.</p>
            <div class="container-fuild">
            <div class="col-xs-3">
            <input type="Email" name="email" class="form-control" id="email" required></div>
            <div class="col-xs-3">
            <button type="button" onclick="loaddata();" class="btn btn-primary">Forgot Password</button> </div>
            </div>
                <br> <br> <br>
            </div>
        </div>

</div>
    <!-- /.container -->

    <!-- Modal failure-->
<div class="modal fade" id="myModal_fail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot password</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
    Invalid Email.
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
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please check your Email.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
