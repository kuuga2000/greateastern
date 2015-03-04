<?php
/* @var $this EmailsentController */
/* @var $data GEEmailSent */
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
	<b><?php echo CHtml::encode($data->getAttributeLabel('send_sample_to')); ?>:</b>
	<?php echo CHtml::encode($data->send_sample_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_id')); ?>:</b>
	<?php echo CHtml::encode($data->template_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_name')); ?>:</b>
	<?php echo CHtml::encode($data->from_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_subject_line')); ?>:</b>
	<?php echo CHtml::encode($data->email_subject_line); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_email_address')); ?>:</b>
	<?php echo CHtml::encode($data->from_email_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content_email')); ?>:</b>
	<?php echo CHtml::encode($data->content_email); ?>
	<br />

	*/ ?>

</div>