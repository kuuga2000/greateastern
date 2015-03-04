<?php
/* @var $this ClientsController */
/* @var $model GEClient */

$this->breadcrumbs=array(
	'Geclients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEClient', 'url'=>array('index')),
	array('label'=>'Manage GEClient', 'url'=>array('admin')),
);
?>

<h1>Create GEClient</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>