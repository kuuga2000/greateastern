<?php
/* @var $this MarketingplansController */
/* @var $model GEEmailMarketing */

$this->breadcrumbs=array(
	'Geemail Marketings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GEEmailMarketing', 'url'=>array('index')),
	array('label'=>'Create GEEmailMarketing', 'url'=>array('create')),
	array('label'=>'View GEEmailMarketing', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GEEmailMarketing', 'url'=>array('admin')),
);
?>

<h1>Update GEEmailMarketing <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>