<?php
/* @var $this AgentsController */
/* @var $model GEAgent */

$this->breadcrumbs=array(
	'Geagents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEAgent', 'url'=>array('index')),
	array('label'=>'Manage GEAgent', 'url'=>array('admin')),
);
?>

<h1>Create GEAgent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>