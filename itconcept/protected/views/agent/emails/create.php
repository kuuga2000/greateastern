<?php
/* @var $this EmailtemplatesController */
/* @var $model GEEmailTemplate */

$this->breadcrumbs=array(
	'Geemail Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEEmailTemplate', 'url'=>array('index')),
	array('label'=>'Manage GEEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>Create GEEmailTemplate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>