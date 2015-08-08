<?php
 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
   'id' => 'bandsdialog3',
   'options' => array(
   'autoOpen' => true,
   'title' => at('Choose Employee'),
   'modal' => false,
   'width' => '600',
   ))
 );
 $this->widget('CGridView', array(
   'id'=>'user-grid',
   'dataProvider'=>$model->search(),
   'itemsCssClass' => 'table datatable',
   'columns'=>array(
       'id',
       'firstname',
        array(
           'header'=>at('Choose'),
           'type'=>'raw',
           'value'=>'CHtml::link(at("Choose"),"",array(
               "onClick"=>CHtml::ajax(array(
               "url"=>Yii::app()->createUrl("employees/select",array("id"=>$data->primaryKey)),
               "dataType"=>"json",
               "success"=>"function(data){
                     $(\"#LeaveRequest_employee_id\").val(data.id);
                     $(\"#employee_name\").val(data.name);
					 $(\"#LeaveRequest_department_id\").val(data.dept_id);
                     $(\"#bandsdialog3\").remove();
                }")
            ),"id"=>"child".$data->primaryKey,"style"=>"cursor:pointer;"))',
         ),
       ),
  ));
  $this->endWidget('zii.widgets.jui.CJuiDialog');
 ?>