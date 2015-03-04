<?php
/* @var $this AgentsController */
/* @var $model GEAgent */

$this->breadcrumbs=array(
	'Geagents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEAgent', 'url'=>array('index')),
	array('label'=>'Create GEAgent', 'url'=>array('create')),
	array('label'=>'View GEAgent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEAgent', 'url'=>array('admin')),
);
?>

<h1>Update GEAgent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>