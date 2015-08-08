<?php
/* @var $this MastersEmployees1Controller */
/* @var $data MastersEmployees */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nickname')); ?>:</b>
	<?php echo CHtml::encode($data->nickname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion_id')); ?>:</b>
	<?php echo CHtml::encode($data->religion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ethnic_id')); ?>:</b>
	<?php echo CHtml::encode($data->ethnic_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthplace_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->birthplace_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthplace_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->birthplace_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthplace_city_id')); ?>:</b>
	<?php echo CHtml::encode($data->birthplace_city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthplace_district_id')); ?>:</b>
	<?php echo CHtml::encode($data->birthplace_district_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('poscode')); ?>:</b>
	<?php echo CHtml::encode($data->poscode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
	<?php echo CHtml::encode($data->birthdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('married_status')); ?>:</b>
	<?php echo CHtml::encode($data->married_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('married_date')); ?>:</b>
	<?php echo CHtml::encode($data->married_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('child_amount')); ?>:</b>
	<?php echo CHtml::encode($data->child_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identity_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->identity_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identity_number')); ?>:</b>
	<?php echo CHtml::encode($data->identity_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hiredate')); ?>:</b>
	<?php echo CHtml::encode($data->hiredate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_id')); ?>:</b>
	<?php echo CHtml::encode($data->department_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('section_id')); ?>:</b>
	<?php echo CHtml::encode($data->section_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outlet_id')); ?>:</b>
	<?php echo CHtml::encode($data->outlet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('position_id')); ?>:</b>
	<?php echo CHtml::encode($data->position_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_id')); ?>:</b>
	<?php echo CHtml::encode($data->level_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grade_id')); ?>:</b>
	<?php echo CHtml::encode($data->grade_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resident_status')); ?>:</b>
	<?php echo CHtml::encode($data->resident_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_periode_start')); ?>:</b>
	<?php echo CHtml::encode($data->contract_periode_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_periode_end')); ?>:</b>
	<?php echo CHtml::encode($data->contract_periode_end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_account_no')); ?>:</b>
	<?php echo CHtml::encode($data->bank_account_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_account_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_account_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_address')); ?>:</b>
	<?php echo CHtml::encode($data->bank_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salary_id')); ?>:</b>
	<?php echo CHtml::encode($data->salary_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_area_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_area_id); ?>
	<br />

	*/ ?>

</div>