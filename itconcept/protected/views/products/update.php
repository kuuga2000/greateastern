<?php
/* @var $this ProductsController */
/* @var $model GEProduct */

$this->breadcrumbs=array(
	'Geproducts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEProduct', 'url'=>array('index')),
	array('label'=>'Create GEProduct', 'url'=>array('create')),
	array('label'=>'View GEProduct', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEProduct', 'url'=>array('admin')),
);
?>

<h1>Update GEProduct <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>