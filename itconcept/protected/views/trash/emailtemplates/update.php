<?php
/* @var $this EmailtemplatesController */
/* @var $model GEEmailTemplate */

$this->breadcrumbs=array(
	'Geemail Templates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEEmailTemplate', 'url'=>array('index')),
	array('label'=>'Create GEEmailTemplate', 'url'=>array('create')),
	array('label'=>'View GEEmailTemplate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>Update GEEmailTemplate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>