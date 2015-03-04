<?php
/* @var $this ContactsController */
/* @var $model GEContact */

$this->breadcrumbs=array(
	'Gecontacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEContact', 'url'=>array('index')),
	array('label'=>'Create GEContact', 'url'=>array('create')),
	array('label'=>'View GEContact', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEContact', 'url'=>array('admin')),
);
?>

<h1>Update GEContact <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>