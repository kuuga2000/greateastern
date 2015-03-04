<?php
/* @var $this StatusController */
/* @var $model GEStatus */

$this->breadcrumbs=array(
	'Gestatuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEStatus', 'url'=>array('index')),
	array('label'=>'Manage GEStatus', 'url'=>array('admin')),
);
?>

<h1>Create GEStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>