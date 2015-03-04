<?php
/* @var $this LeadsController */
/* @var $model GELead */

$this->breadcrumbs=array(
	'Geleads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GELead', 'url'=>array('index')),
	array('label'=>'Create GELead', 'url'=>array('create')),
	array('label'=>'View GELead', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GELead', 'url'=>array('admin')),
);
?>

<h1>Update GELead <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>