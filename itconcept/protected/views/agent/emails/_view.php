<?php
/* @var $this EmailtemplatesController */
/* @var $data GEEmailTemplate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_name')); ?>:</b>
	<?php echo CHtml::encode($data->template_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_subject_line')); ?>:</b>
	<?php echo CHtml::encode($data->email_subject_line); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_name')); ?>:</b>
	<?php echo CHtml::encode($data->from_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_email_address')); ?>:</b>
	<?php echo CHtml::encode($data->from_email_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bcc_yourself')); ?>:</b>
	<?php echo CHtml::encode($data->bcc_yourself); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template')); ?>:</b>
	<?php echo CHtml::encode($data->email_template); ?>
	<br />


</div>