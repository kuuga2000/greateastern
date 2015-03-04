<?php
/* @var $this MarketingplansController */
/* @var $data GEEmailMarketing */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('select_recipients')); ?>:</b>
	<?php echo CHtml::encode($data->select_recipients); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_with_temperature')); ?>:</b>
	<?php echo CHtml::encode($data->send_with_temperature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_with_status')); ?>:</b>
	<?php echo CHtml::encode($data->send_with_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_with_coverage')); ?>:</b>
	<?php echo CHtml::encode($data->send_with_coverage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_with_carrier')); ?>:</b>
	<?php echo CHtml::encode($data->send_with_carrier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_with_product')); ?>:</b>
	<?php echo CHtml::encode($data->send_with_product); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('template_id')); ?>:</b>
	<?php echo CHtml::encode($data->template_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('send_after')); ?>:</b>
	<?php echo CHtml::encode($data->send_after); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_name')); ?>:</b>
	<?php echo CHtml::encode($data->time_name); ?>
	<br />

	*/ ?>

</div>