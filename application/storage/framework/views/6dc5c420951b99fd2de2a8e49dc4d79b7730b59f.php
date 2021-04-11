

<?php $__env->startSection('content'); ?>

<!-- ================================
    START DASHBOARD AREA
================================= -->
<section class="dashboard-area">

    <?php echo $__env->make('layouts.components.side_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="dashboard-content-wrap">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="card-box-shared">
                        <h3 style="padding: 2%">Course Assign</h3>
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <div class="input-box col-lg-4">
                                <label class="label-text">Course Name</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="course_name" id="course">
                                    <input type="hidden" name="course_id" id="course_id" class="course_id">
                                    <div class="error"><span id="course_error"></span></div>
                                </div>
                            </div>
                            <div class="input-box col-lg-4">
                                <label class="label-text">No Of Units</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="balance_credit" name="no_of_units" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <a class="theme-btn buy_now" href="<?php echo e(url('credits/create')); ?>">Buy Now</a>
                            </div>
                        </div>
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <div class="input-box col-lg-4">
                                <label class="label-text">User Name</label>
                                <div class="form-group">
                                    <input class="form-control user_name" type="text" name="user_name" id="user_name" readonly>
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="error"><span id="allocate_error"></span></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="theme-btn allocate" style="margin-right: 10px">Add To List</button>
                                <button class="theme-btn reset">Reset</button>
                            </div>
                            <div class="col-lg-4">
                            </div>
                        </div>
                        <div class="card-box-shared-body">
                            <h5 style="margin-bottom: 10px;">Assignment List</h5>
                            <div class="statement-table purchase-table table-responsive mb-5">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">S.No.</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="line_items">
                                    </tbody>
                                </table>
                                <table class="table" style="margin-top: 4%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="statement-info">
                                                    <ul class="list-items">
                                                        <li><span class=""></span>Credit Available</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="statement-info">
                                                    <ul class="list-items">
                                                        <li><span class="credit_available"></span></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="statement-info">
                                                    <ul class="list-items">
                                                        <li><span class=""></span>Credit Allocated</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="statement-info">
                                                    <ul class="list-items">
                                                        <li><span class="credit_allocated"></span></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="statement-info">
                                                    <ul class="list-items">
                                                        <li><span class=""></span>Balance</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="statement-info">
                                                    <ul class="list-items">
                                                        <li><span class="balance"></span></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end">
                                    <button class="theme-btn view-btn allocate_now">Allocate Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal-form text-center" id="modal">
    <div class="modal fade cnf_model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Are you sure you want proceed.</h4>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <a href="javascript:void(0);" type="button" class="theme-btn border-0 allocate_cnf" data-dismiss="modal">Yes</a>
                </div>
            </div><!-- end modal-content -->
        </div><!-- end modal-dialog -->
    </div><!-- end modal -->
</div><!-- end modal-form -->

<!-- start scroll top -->
<div id="scroll-top">
    <i class="fa fa-angle-up" title="Go top"></i>
</div>
<!-- end scroll top -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">    
    var user_listing = [];
    var netbal = 0;
    var bal_credit = 0;

    $('.credit_available').html(bal_credit);
    $('.balance').html(netbal);
    $('.credit_allocated').html(user_listing.length);

    $('.buy_now').hide();      
    $('.allocate_now').hide();        

    $('#course').autocomplete({
        source: "<?php echo e(url('course_unit')); ?>",
        select: function(event, ui) {
            $("#course").val(ui.item.value);
            $("#course_id").val(ui.item.id);
            $("#balance_credit").val(ui.item.balance_credit);
        }
    });
        
    $('#course').on("blur", function(e) {
        var course_id = $('#course_id').val();
        if(course_id)
        {
            $('#course_error').html('');
            $('#course').attr('readonly',true);
            var bal = $('#balance_credit').val();
            if(bal == 0)
            {
                $('.buy_now').show();
                $('.user_name').attr('readonly',true);
            }
            else
            {
                $('.buy_now').hide();
                $('.user_name').attr('readonly',false);
            }

            $('.user_name').autocomplete({
                source: "<?php echo e(url('/user_list')); ?>/"+course_id,
                select: function(event, ui) {            
                    $("#user_id").val(ui.item.id);
                    $("#user_name").val(ui.item.value);
                    var index = user_listing.findIndex(p => p.user_id == ui.item.id)
                    if(index > -1)
                    {
                        alert('Already exisist');
                        $("#user_name").val('');
                        $("#user_id").val('');
                    }
                }
            });
        }
        else
        {
            $('#course').attr('readonly',false);
            $('.buy_now').hide();
            $('#course_error').html('Please course from autocomplete');
        }
    });

    $('.allocate').on("click", function(e) {        
        var user_id = $("#user_id").val();
        var user_name = $("#user_name").val();
        var course_id = $("#course_id").val();
        if(user_id == '')
        {
            $('#allocate_error').html('Please select the user from autocomplete');
        }
        else
        {
            $('#allocate_error').html('');
            calculation();
        }
    });

    function calculation()
    {
        var user_id = $("#user_id").val();
        var user_name = $("#user_name").val();
        var course_id = $("#course_id").val();
        var obj = {};
        obj["user_name"] = user_name;
        obj["user_id"] = user_id;
        obj["course_id"] = course_id;
        if(user_name != '')
        {
            user_listing.push(obj);
        }
        netbal = 0;
        bal_credit = 0;
        $('.credit_allocated').html('');
        var data = "";
        for (var i = 0; i < user_listing.length; i++) {
            data += '<tr><td>' + (i + 1) + '</td><td>' + user_listing[i].user_name + '</td><td><a href="javascript:;" class="remove" data-id="'+i+'" ><i class="la la-times-circle" style="color:red;"></i></a></td></tr>';
        }
        $('.line_items').html(data);
        bal_credit = $('#balance_credit').val();
        $('.credit_available').html(bal_credit);
        netbal = bal_credit - user_listing.length;
        $('.balance').html(netbal);
        $('.credit_allocated').html(user_listing.length);
        $("#user_id").val('');
        $("#user_name").val('');
    
        if(user_listing.length > 0)
        {
            $('.allocate_now').show();        
        }
        else
        {
            $('.allocate_now').hide();        
        }

    }
    
    $('body').on('click','.remove',function() {
        var id = parseInt($(this).attr("data-id"));
        user_listing.splice(id);
        console.log(user_listing);
        calculation();
    });

    $('.allocate_now').on("click", function(e) {
        $('.cnf_model').modal('show');
    });

    $('.allocate_cnf').on("click", function(e) {
        var course_id = $("#course_id").val();
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo e(url('/course_assign')); ?>",
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                user_listing:user_listing, course_id:course_id
            },
            success: function(data)
            {
              window.location.replace("<?php echo e(url('/course_assign')); ?>");
            }
        });
    });

    $('.reset').on("click", function(e) {
        $('#course').attr('readonly',false);
        $('#course').val('');
        $("#balance_credit").val('');
        $("#user_id").val('');
        $("#user_name").val('');
        user_listing = [];
        obj = {};
        data = "";
        $('.line_items').html(data);
        $('.credit_available').html('');
        $('.credit_allocated').html('');
        $('.balance').html('');
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/course_assign/course_assign.blade.php ENDPATH**/ ?>