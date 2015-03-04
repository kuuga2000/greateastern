<?php
/* @var $this ProductsController */
/* @var $model GEProduct */

$this->breadcrumbs=array(
	'Geproducts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEProduct', 'url'=>array('index')),
	array('label'=>'Manage GEProduct', 'url'=>array('admin')),
);
?>

<h1>Create GEProduct</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>