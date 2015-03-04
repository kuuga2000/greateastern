<?php
/* @var $this EmailsentController */
/* @var $model GEEmailSent */

$this->breadcrumbs=array(
	'Geemail Sents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEEmailSent', 'url'=>array('index')),
	array('label'=>'Create GEEmailSent', 'url'=>array('create')),
	array('label'=>'View GEEmailSent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEEmailSent', 'url'=>array('admin')),
);
?>

<h1>Update GEEmailSent <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>