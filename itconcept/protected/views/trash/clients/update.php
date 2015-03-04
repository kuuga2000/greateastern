<?php
/* @var $this ClientsController */
/* @var $model GEClient */

$this->breadcrumbs=array(
	'Geclients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEClient', 'url'=>array('index')),
	array('label'=>'Create GEClient', 'url'=>array('create')),
	array('label'=>'View GEClient', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEClient', 'url'=>array('admin')),
);
?>

<h1>Update GEClient <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>