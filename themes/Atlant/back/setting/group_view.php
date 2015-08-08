<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Update Settings'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<div class="row">
	<div class="col-md-12">
		<?php echo CHtml::beginForm('', 'post', array('class'=>'form-horizontal')); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php if( count($settings) ): ?>
				<ul class="panel-controls">
					<li>
						<input type="submit" name='reorder' class="btn btn-warning" value="<?php echo at('Reorder'); ?>" />
						<input type="submit" name='submit' class="btn btn-primary" value="<?php echo at('Update'); ?>" />
						&nbsp; | &nbsp;
					</li>
					<li><a href='<?php echo $this->createUrl('index'); ?>' class='panel-remove'><i class="glyphicon glyphicon-arrow-left"></i></a></li>
				</ul>
				<?php endif; ?>
				
			</div>

			<div class="panel-body">

					<?php $open = 0; $close = 0; ?>
					<?php if( count($settings) ): ?>

						<?php foreach($settings as $row): ?>
							
							<?php if($row->group_title): ?>
								<?php $open++; ?>
								<!-- Open Group <?php echo $row->group_title; ?> -->
								<div class='grid_12'>
								<div class="box">
									<div class="title"><?php echo $row->group_title; ?></div>
							<?php endif; ?>
							
							<?php echo $this->renderPartial('_setting_row', array('row' => $row), true); ?>
							
							<?php if($row->group_close): ?>
								<?php $close++; ?>
								</div>
								</div>
							<?php endif; ?>
							
						<?php endforeach; ?>
						
						<?php for($i=$close; $i < $open; $i++): ?>
							<!-- Close Group -->
							</div>
							</div>
						<?php endfor; ?>

					<?php else: ?>
						<p><?php echo at('No Settings Found.'); ?></p>
					<?php endif; ?>
			
			</div>
		</div>
		<?php echo CHtml::endForm(); ?>
	</div>
</div>
