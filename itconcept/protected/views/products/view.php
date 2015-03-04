<?php
/* @var $this ProductsController */
/* @var $model GEProduct */

$this->breadcrumbs=array(
	'Geproducts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEProduct', 'url'=>array('index')),
	array('label'=>'Create GEProduct', 'url'=>array('create')),
	array('label'=>'Update GEProduct', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEProduct', 'url'=>array('admin')),
);
?>

<h1>View GEProduct #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'coverage_id',
		'product_name',
		'commission',
		'renewal',
	),
)); ?>
