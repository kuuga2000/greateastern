<?php
/* @var $this EmailsentController */
/* @var $model GEEmailSent */

$this->breadcrumbs=array(
	'Geemail Sents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEEmailSent', 'url'=>array('index')),
	array('label'=>'Create GEEmailSent', 'url'=>array('create')),
	array('label'=>'Update GEEmailSent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEEmailSent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEEmailSent', 'url'=>array('admin')),
);
?>

<h1>View GEEmailSent #<?php echo $model->id; ?></h1>

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
		'send_sample_to',
		'template_id',
		'from_name',
		'email_subject_line',
		'from_email_address',
		'content_email',
	),
)); ?>
