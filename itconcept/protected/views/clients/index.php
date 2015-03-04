<?php
/* @var $this ClientsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geclients',
);

$this->menu=array(
	array('label'=>'Create GEClient', 'url'=>array('create')),
	array('label'=>'Manage GEClient', 'url'=>array('admin')),
);
?>

<h1>Geclients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
