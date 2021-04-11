<style>
  .close_btn
  {
    float: right !important;
    right: 20px;
    position: absolute;
    color: #000;
    bottom: 15px;
  }
</style>
<div class="row">
  <div class="col-md-12">  
    @if($message = Session::get('success'))
      <div class="alert alert-success">
          <span><i class="fa fa-check" aria-hidden="true"></i> {{ $message }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="close_btn"><i class="fa fa-times"></i></span>
          </button>
      </div>
      <?php Session::forget('success');?>
    @endif 
    @if($message = Session::get('error'))
      <div class="alert alert-danger">
        <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $message }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="close_btn"><i class="fa fa-times"></i></span>
        </button>
      </div>
      <?php Session::forget('error');?>
    @endif
  </div>   
</div>