<?php
/* @var $this ContactsController */
/* @var $model GEContact */

$this->breadcrumbs=array(
	'Gecontacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEContact', 'url'=>array('index')),
	array('label'=>'Manage GEContact', 'url'=>array('admin')),
);
?>

<h1>Create GEContact</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>