<?php
/* @var $this MarketingplansController */
/* @var $model GEEmailMarketing */

$this->breadcrumbs=array(
	'Geemail Marketings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEEmailMarketing', 'url'=>array('index')),
	array('label'=>'Create GEEmailMarketing', 'url'=>array('create')),
	array('label'=>'Update GEEmailMarketing', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEEmailMarketing', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEEmailMarketing', 'url'=>array('admin')),
);
?>

<h1>View GEEmailMarketing #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'select_recipients',
		'send_with_temperature',
		'send_with_status',
		'send_with_coverage',
		'send_with_carrier',
		'send_with_product',
		'template_id',
		'send_after',
		'time_name',
	),
)); ?>
