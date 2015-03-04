<?php
/* @var $this EmailsentController */
/* @var $model GEEmailSent */

$this->breadcrumbs=array(
	'Geemail Sents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEEmailSent', 'url'=>array('index')),
	array('label'=>'Manage GEEmailSent', 'url'=>array('admin')),
);
?>

<h1>Create GEEmailSent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>