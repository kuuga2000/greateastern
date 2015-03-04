<?php
/* @var $this ProductsController */
/* @var $data GEProduct */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coverage_id')); ?>:</b>
	<?php echo CHtml::encode($data->coverage_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
	<?php echo CHtml::encode($data->product_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('commission')); ?>:</b>
	<?php echo CHtml::encode($data->commission); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('renewal')); ?>:</b>
	<?php echo CHtml::encode($data->renewal); ?>
	<br />


</div>