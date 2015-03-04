<?php
/* @var $this StatusController */
/* @var $model GEStatus */

$this->breadcrumbs=array(
	'Gestatuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEStatus', 'url'=>array('index')),
	array('label'=>'Create GEStatus', 'url'=>array('create')),
	array('label'=>'View GEStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEStatus', 'url'=>array('admin')),
);
?>

<h1>Update GEStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>