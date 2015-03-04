<?php
/* @var $this MarketingplansController */
/* @var $model GEEmailMarketing */

$this->breadcrumbs=array(
	'Geemail Marketings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GEEmailMarketing', 'url'=>array('index')),
	array('label'=>'Manage GEEmailMarketing', 'url'=>array('admin')),
);
?>

<h1>Create GEEmailMarketing</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>