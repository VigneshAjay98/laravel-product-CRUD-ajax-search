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
    <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
          <span><i class="fa fa-check" aria-hidden="true"></i> <?php echo e($message); ?></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="close_btn"><i class="fa fa-times"></i></span>
          </button>
      </div>
      <?php Session::forget('success');?>
    <?php endif; ?> 
    <?php if($message = Session::get('error')): ?>
      <div class="alert alert-danger">
        <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e($message); ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="close_btn"><i class="fa fa-times"></i></span>
        </button>
      </div>
      <?php Session::forget('error');?>
    <?php endif; ?>
    <?php if($message = Session::get('info')): ?>
      <div class="alert alert-info">
          <span><i class="fa fa-info" aria-hidden="true"></i> <?php echo e($message); ?></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="close_btn"><i class="fa fa-times"></i></span>
          </button>
      </div>
      <?php Session::forget('info');?>
    <?php endif; ?>
    <?php if($message = Session::get('warning')): ?>
      <div class="alert alert-warning">
          <span><i class="fa fa-exclamation" aria-hidden="true"></i> <?php echo e($message); ?></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="close_btn"><i class="fa fa-times"></i></span>
          </button>
      </div>
      <?php Session::forget('warning');?>
    <?php endif; ?>
  </div>   
</div><?php /**PATH D:\Office\Projects\Environments\xampp\htdocs\learning\application\resources\views/component/alert.blade.php ENDPATH**/ ?>