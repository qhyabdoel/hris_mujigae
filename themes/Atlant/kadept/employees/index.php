<!-- PAGE TITLE -->
<div class="page-title">                    
	<h2><span class="<?php echo $this->icon_class; ?>"></span> <?php echo at('Employees'); ?></h2>
</div>
<!-- END PAGE TITLE -->

<?php

if(getUser()->role=='rm') $template = '{view}{mutation}';
else $template = '{view}{mutation}<br>{rotation}';

Yii::app()->clientScript->registerScript('search', 
	"$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
	$('.search-form form').submit(function(){
		$('#masters-employees-grid').yiiGridView('update', {
			data: $(this).serialize()
		});
		return false;
	});"
);

?>

<div class="row">
    <div class="col-md-12">

		<!-- START DEFAULT DATATABLE -->
		<div class="panel panel-default">
			<div class="panel-heading">                                
				<?php /*echo CHtml::link(at('Create Employee'), array('create'), array('class'=>'btn btn-primary'));*/ ?>
				<ul class="panel-controls">
					<li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
				</ul>                                
			</div>
			<div class="panel-body">
			<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
			
			<div class="search-form" style="display:none">
			<?php $this->renderPartial('_search',array(
				'model'=>$model,
			)); ?>
			</div><!-- search-form -->

				<?php $this->widget('DTGridView', array(
					'id' 			=> 'masters-employees-grid',
					'itemsCssClass' => 'table datatable',
					'dataProvider' 	=> $model->search(),
					
					'columns' => array(
						array('name'=>'id', 'header'=>'#', 'htmlOptions' => array( 'style' => 'width:50px;') ),
						array('name'=>'code', 'header'=>at('NIK')),
						array('name'=>'email', 'header'=>at('Email')),						
						array('name'=>'firstname', 'header'=>at('Full Name'), 'value'=>'$data->getFullname()'),
					
						array(
							'name' 		=> 'gender',
							'header' 	=> at("Gender"),
							'value' 	=> 'MyHelper::viewGender($data->gender)',
						),

						array('name'=>'hiredate', 'header'=>at('Hire Date')),
					
						array(
							'name' 		=> 'grade', 
							'header' 	=> at('Grade'),
							'value' 	=> '$data->grade->grade',
						),
					
						array(
							'name' 		=> 'status',
							'header' 	=> at("Status"),
							'value' 	=> '$data->viewStatus()',
						),
					
						array(
							'name' 		=> 'is_active',
							'header' 	=> at("Is Active"),
							'value' 	=> '$data->is_active == 1 ? at("Active") : at("Not Active")',
							'filter' 	=> CHtml::dropDownList('Products[is_active]', $model->is_active,  
								array(
									'' 	=> '',
									'1' => at('Active'),
									'0' => at('Not Active'),
								)
							),
						),
					
						array(
							'class' 		=> 'CButtonColumn',
							'template' 		=> $template,
							'htmlOptions' 	=> array('style'=>'width: 70px'),							
							'buttons' 		=> array(
								'mutation' 	=> array(
									'title' => 'Mutation',
									'url' 	=> 'createUrl("employees/mutation", array("id"=>"$data->id"))',
								),
								'rotation' 	=> array(
									'title' => 'Rotation',
									'url' 	=> 'createUrl("employees/rotation", array("id"=>"$data->id"))',
								),
							),
						),
					),
				)); ?>
			</div>
		</div>
		<!-- END DEFAULT DATATABLE -->
	</div>
</div>

<div class="clear"></div>