<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href="<?php echo e(asset('asset/Invoice/css/style.css')); ?>" />
	<style>
		.bill_table {
			border-left-style: hidden;
			border-right-style: hidden;
			border-bottom-style: hidden;
		}

		#customer-title {
			pointer-events: none;
		}

		#address {
			pointer-events: none;
		}

		textarea {
			pointer-events: none;
		}

		.item-name {
			pointer-events: none;
		}
	</style>
</head>

<body style="padding: 25px;">
	<div class="container-fluid invoice_pdf">
		<div class="col-sm-12">
			<div class="iq-card">
				<div id="page-wrap">
					<div id="identity">
					</div>
					<div style="display: flex;">
						<div>
							<img id="image" src="<?php echo e(asset('asset/images/logo/logo_grey_sm.jpeg')); ?>" alt="logo" ><br>
							<ul style="list-style-type:none;">
								<li style="">33 Rumballs Road</li>
								<li>Hemel Hempstead HP38JA</li>
								<li>United Kingdom</li>
								<li>Phone: +44 7510 486185</li>
							</ul>
						</div>
						<div>
							<table style="margin-left: auto;">
								<tr>
									<td class="meta-head">Invoice Number</td>
									<td><?php echo e($invoice_head->invoice_number); ?></td>
								</tr>
								<tr>
									<td class="meta-head">Invoice Date</td>
									<td><?php echo e($invoice_head->created_at); ?></td>
								</tr>
								<tr>
									<td class="meta-head">Payment Date</td>
									<td><?php echo e($invoice_head->updated_at); ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div id="customer">
						<table id="items" style="padding-top: 20px;">
							<tr>
								<th colspan="4">BILL TO</th>
							</tr>
							<tr class="item-row bill_table">
								<td class="item-name">
									<div class="delete-wpr">Name : <?php echo e($user->name); ?></div>
								</td>
							</tr>
							<tr class="item-row bill_table">
								<td class="item-name">
									<div class="delete-wpr">Street Address : <?php echo e($user->address); ?></div>
								</td>
							</tr>
							<tr class="item-row bill_table">
								<td class="item-name">
									<div class="delete-wpr">City: <?php echo e($user->city); ?></div>
								</td>
							</tr>
							<tr class="item-row bill_table">
								<td class="item-name">
									<div class="-wpr">Phone: <?php echo e($user->phone); ?></div>
								</td>
							</tr>
							<tr class="item-row bill_table">
								<td class="item-name">
									<div class="delete-wpr">Email Address : <?php echo e($user->email); ?></div>
								</td>
							</tr>
						</table>
					</div>
					<table id="items">
						<tr>
							<th colspan="2">Course</th>
							<th colspan="2">Type</th>
							<th colspan="2">Credits</th>
							<th colspan="2">Unit Price</th>
							<th>Amount</th>
						</tr>
						<?php $__currentLoopData = $invoice_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr class="item-row">
							<td class="item-name" colspan="2">
								<div class="delete-wpr"><textarea><?php echo e($detail->course_details->title); ?></textarea></div>
							</td>
							<td class="item-name" colspan="2">
								<div class="delete-wpr"><textarea><?php echo e(ucfirst($detail->type)); ?></textarea></div>
							</td>
							<td class="item-name" colspan="2">
								<div class="delete-wpr"><textarea><?php echo e($detail->credit); ?></textarea></div>
							</td>
							<td class="hours" colspan="2"><textarea class="cost"><?php echo e($detail->price); ?></textarea></td>
							<td colspan="2"><textarea><?php echo e($detail->total_amount); ?></textarea></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<tr id="hiderow">
							<td colspan="9"></td>
						</tr>
						<tr>
							<td colspan="6" class="blank"> </td>
							<td colspan="2" class="total-line">Subtotal</td>
							<td class="total-value">
								<div id="subtotal"><?php echo e($invoice_head->sub_total); ?></div>
							</td>
						</tr>
						<tr>
							<td colspan="6" class="blank"> </td>
							<td colspan="2" class="total-line">VAT(20%)</td>
							<td class="total-value">
								<div id="total"><?php echo e($invoice_head->vat); ?></div>
							</td>
						</tr>
						<tr>
							<td colspan="6" class="blank"> </td>
							<td colspan="2" class="total-line">Total</td>
							<td class="total-value"><textarea id="paid">&#163;<?php echo e($invoice_head->total_amount); ?></textarea></td>
						</tr>
					</table>
					<div class="form-group row col-md-6 offset-md-3">
					</div>
					<div id="terms">
						<h5 style="color: red;">Thank you for your business!</h5>
						<textarea>If you have any questions about this invoice, please contact.IPT-Infotech , Phone: +44 7510 486185, invoice@iptinfotech.co.uk</textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html><?php /**PATH E:\xampp\htdocs\learning\application\resources\views/invoice.blade.php ENDPATH**/ ?>