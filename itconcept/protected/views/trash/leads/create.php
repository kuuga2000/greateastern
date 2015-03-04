<?php
/* @var $this LeadsController */
/* @var $model GELead */

$this->breadcrumbs=array(
	'Geleads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GELead', 'url'=>array('index')),
	array('label'=>'Manage GELead', 'url'=>array('admin')),
);
?>

<h1>Create GELead</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>