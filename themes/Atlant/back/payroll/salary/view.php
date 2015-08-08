<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Slip Salary'); ?> - <span class="data-info"><?php echo $model->employee->getFullname() ?></span></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<div class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="panel-controls">
						<li><?php echo CHtml::link(at('Back'), createUrl('payroll/salary'), array('class'=>'btn btn-default')); ?></li>
						<li><?php echo CHtml::link(at('Edit'), createUrl('payroll/salary/update', array('id'=>$model->id)), array('class'=>'btn btn-primary')); ?></li>
						<li><?php echo CHtml::link(at('Print'), createUrl('payroll/salary/print', array('id'=>$model->id)), array('class'=>'btn btn-warning')); ?></li>
					</ul>
				</div>

				<div class="panel-body">
<table class="table">
<thead>
	<tr>
		<td>LOGO</td>
		<td>
			<h1><?php echo strtoupper(at('Slip Gaji')); ?></h1>
			<span>Periode: <?php echo $model->viewPeriode(); ?></span>
		</td>
	</tr>
</thead>
<tbody>
<tr>
	<td colspan='2'>
		<table class="table">
		<tbody>
			<tr><th><?php echo at('Date'); ?></th><td><?php echo date('d M Y'); ?></td>
				<th><?php echo at('Position'); ?></th><td><?php echo $model->employee->position->name; ?></td>
			</tr>
			<tr></tr>
			<tr><th><?php echo at('NIK'); ?></th><td><?php echo $model->employee->code; ?></td>
				<th><?php echo at('Department'); ?></th><td><?php echo $model->employee->department->name; ?></td>
			</tr>
			<tr><th><?php echo at('Fullname'); ?></th><td><?php echo $model->employee->getFullname(); ?></td>
				<th><?php echo at('Grade'); ?></th><td><?php echo $model->employee->viewGrade(); ?></td>
			</tr>
		</tbody>
		</table>
	</td>
</tr>
<tr>
	<td>
		<h2><?php echo at('Attendance Recap'); ?></h2>
		<table class="table">
		<tbody>
			<?php $recap = $model->attendancerecap; ?>
			<tr><th><?php echo at('Total In'); ?></th><td><?php echo $recap->total_in.' / '.MyHelper::getTotalWorkDay(); ?></td></tr>
			<tr><th><?php echo at('Total Leaves') ?></th><td><?php echo $recap->total_leave; ?></td></tr>
			<tr><th><?php echo at('Total Sick') ?></th><td><?php echo $recap->total_sick; ?></td></tr>
			<tr><th><?php echo at('Total Alpha') ?></th><td><?php echo MyHelper::getTotalWorkDay() - ($recap->total_in + $recap->total_leave + $recap->total_sick); //$recap->total_alpha; ?></td></tr>
			<tr><th><?php echo at('Total Late') ?></th><td><?php echo $recap->total_late; ?></td></tr>
		</tbody>
		</table>
	</td>
	<td>
		<h2><?php echo at('Income'); ?></h2>
		<table class="table">
		<tbody>
			<tr><th><?php echo at('Basic Salary') ?></th><td><?php echo formatCurrency($model->basic_salary); ?></td></tr>
			<?php $salaryallowances = $model->payrollSalaryAllowances; ?>
			<?php foreach($salaryallowances as $salaryallowance) { ?>
				<tr><th><?php echo $salaryallowance->allowance->name; ?></th><td><?php echo formatCurrency($salaryallowance->values); ?></td></tr>
			<?php } ?>
		</tbody>
		</table>
	</td>
</tr>
</tbody>
<tfoot>
	<table class="table">
	<tbody>
		<tr><td colspan="2" width="50%"><span class="terbilang"><?php echo Terbilang::write($model->total_salary); ?></span></td>
			<th><?php echo at('Take Home Pay') ?></th>
			<td><?php echo formatCurrency($model->total_salary); ?></td>
		</tr>
	</tbody>
	</table>
</tfoot>
</table>
				</div>
			</div>
		</div>
	</div>
</div>