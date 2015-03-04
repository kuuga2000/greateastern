<?php
/* @var $this EmailtemplatesController */
/* @var $model GEEmailTemplate */

$this->breadcrumbs=array(
	'Geemail Templates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEEmailTemplate', 'url'=>array('index')),
	array('label'=>'Create GEEmailTemplate', 'url'=>array('create')),
	array('label'=>'Update GEEmailTemplate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEEmailTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>View GEEmailTemplate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'template_name',
		'email_subject_line',
		'from_name',
		'from_email_address',
		'bcc_yourself',
		'email_template',
	),
)); ?>
