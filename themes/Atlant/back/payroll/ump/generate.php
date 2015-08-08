<div class="row">
    <div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">

				<?php if(user()->hasFlash('ok')): ?>
					<div class="alert succes_msg">
						<span class="alert_close"></span><?php echo user()->getFlash('ok'); ?>
					</div>
				<?php endif; ?>

				<?php if(user()->hasFlash('error')): ?>
					<div class="alert error_msg">
						<span class="alert_close"></span><?php echo user()->getFlash('error'); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>