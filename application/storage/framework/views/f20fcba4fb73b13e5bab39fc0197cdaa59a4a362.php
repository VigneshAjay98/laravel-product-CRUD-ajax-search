

<?php $__env->startSection('content'); ?>

<?php
    $uri = $_SERVER['REQUEST_URI'];
    $act = explode('/',$uri); 
?>
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
                        <h3 style="padding: 2%"><?php echo e(ucfirst(trans($type))); ?> Credit</h3>
                        <div class="card-box-shared-title d-flex justify-content-between align-items-center">
                            <div class="input-box">
                                <label class="label-text">Course Name</label>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="course_name" id="course">
                                    <input type="hidden" name="course_id" id="course_id">
                                    <div class="error"><span id="course_error"></span></div>
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">Price</label>
                                <div class="form-group">
                                    <?php if(in_array('course', $act)): ?>
                                        <input class="form-control" type="text" name="course_price" id="course_price" readonly>
                                    <?php else: ?>
                                        <input class="form-control" type="text" name="certificate_price" id="certificate_price" readonly>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="input-box">
                                <label class="label-text">No Of Units</label>
                                <div class="form-group">
                                    <input class="form-control" type="number" min="1" id="no_of_units" name="no_of_units">
                                    <div class="error"><span id="unit_error"></span></div>
                                </div>
                            </div>
                            <input type="hidden" name="type" id="type" value="<?php echo e($type); ?>">
                            <button class="theme-btn view-btn add_course"><i class="la la-plus mr-2"></i>Add</button>
                        </div>
                        <div class="card-box-shared-body">
                            <div class="statement-table purchase-table table-responsive mb-5">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No.</th>
                                            <th scope="col">Course Name</th>
                                            <th scope="col">Price Per Unit</th>
                                            <th scope="col">No Of Units</th>
                                            <th scope="col">Total</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="line_items">
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Sub Total</td>
                                            <td class="sub_total"></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>VAT (20%)</td>
                                            <td class="vat"></td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td class="total"></td>
                                            <td></td>

                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="d-flex justify-content-end" style="margin-top: 1%;">
                                    <button class="theme-btn view-btn pay_now">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
<!-- ================================
    END DASHBOARD AREA
================================= -->

<div class="modal-form text-center" id="modal">
    <div class="modal fade cnf_model" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content p-4">
                <div class="modal-top border-0 mb-4 p-0">
                    <div class="alert-content">
                        <span class="la la-exclamation-circle warning-icon"></span>
                        <h4 class="widget-title font-size-20 mt-2 mb-1">Are you sure you want proceed to pay.</h4>
                    </div>
                </div>
                <div class="btn-box">
                    <button type="button" class="btn primary-color font-weight-bold mr-3" data-dismiss="modal">Cancel</button>
                    <a href="javascript:void(0);" type="button" class="theme-btn border-0 payment_cnf" data-dismiss="modal">Yes</a>
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
    $('#course').autocomplete({
        source: "<?php echo e(url('course_list')); ?>",
        select: function(event, ui) {
            $("#course").val(ui.item.value);
            $("#course_id").val(ui.item.id);
            $("#course_price").val(ui.item.course_price);
            $("#certificate_price").val(ui.item.certificate_price);
        }
    });

    var course_credits = [];
    var sub_total = 0;
    var vat = 0;
    var total = 0;
    $('.sub_total').html(sub_total);
    $('.vat').html(vat);
    $('.total').html(total);
    $('.pay_now').hide();

    function calculation(){
        var course_name = $("#course").val();
        var course_id = $("#course_id").val();
        <?php if(in_array('course', $act)) { ?>
            var price = $("#course_price").val();
        <?php } else { ?>
            var price = $("#certificate_price").val();
        <?php } ?>
         var no_of_units = $("#no_of_units").val();
         var total_price = parseInt(price) * parseInt(no_of_units);
            var obj = {};

            var n_obj = course_credits.find(x => x.course_id === course_id);
            console.log(n_obj);
            console.log(course_credits);


            obj["course_name"] = course_name;
            obj["course_id"] = course_id;
            obj["price"] = price;
            obj["no_of_units"] = no_of_units;
            obj["total_price"] = total_price;
            if(course_name != '')
            {
                course_credits.push(obj);
            }
            sub_total = 0;
            vat = 0;
            total = 0;
            var data = "";
            for (var i = 0; i < course_credits.length; i++) {
                data += '<tr><td>' + (i + 1) + '</td><td>' + course_credits[i].course_name + '</td><td>' + course_credits[i].price + '</td><td>' + course_credits[i].no_of_units + '</td><td>' + course_credits[i].total_price + '</td><td><a href="javascript:;" class="remove" data-id="'+i+'" ><i class="la la-times-circle" style="color:red;"></i></a></td></tr>';
                sub_total += course_credits[i].total_price;
            }
            vat = sub_total * (20/100);
            total = sub_total + vat;
            $('.line_items').html(data);
            $('.sub_total').html(sub_total);
            $('.vat').html(vat);
            $('.total').html(total);
            $('.pay_now').show();
            $("#course").val('');
            $("#course_price").val('');
            $("#certificate_price").val('');
            $("#course_id").val('');
            $("#price").val('');
            $("#no_of_units").val('');
    }
    $('.add_course').on("click", function(e) {
        var course_id = $("#course_id").val();
        var no_of_units = $("#no_of_units").val();
        if(course_id == '')
        {
            $('#course_error').html('Please select the course from autocomplete');
        }
        else if(no_of_units == '')
        {
            $('#unit_error').html('Please enter the no of units');
        }
        else
        {
            $('#course_error').html('');   
            $('#unit_error').html('');
            calculation();
        }
    });

     $('body').on('click','.remove',function() {
        var id = parseInt($(this).attr("data-id"));
        course_credits.splice(id);
        console.log(course_credits);
        calculation();
    });

  
    $('.pay_now').on("click", function(e) {
        $('.cnf_model').modal('show');
    });

    $('.payment_cnf').on("click", function(e) {
        var type = $('#type').val();
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo e(url('/credits')); ?>",
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                course_credits:course_credits, sub_total:sub_total, vat:vat, total:total, type:type
            },
            success: function(data)
            {
              window.location.replace("<?php echo e(url('/credits')); ?>");
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/credit/add_credits.blade.php ENDPATH**/ ?>