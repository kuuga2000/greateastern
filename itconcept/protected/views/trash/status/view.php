<?php
/* @var $this StatusController */
/* @var $model GEStatus */

$this->breadcrumbs=array(
	'Gestatuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEStatus', 'url'=>array('index')),
	array('label'=>'Create GEStatus', 'url'=>array('create')),
	array('label'=>'Update GEStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEStatus', 'url'=>array('admin')),
);
?>

<h1>View GEStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>
