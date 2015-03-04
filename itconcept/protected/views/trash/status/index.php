<?php
/* @var $this StatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gestatuses',
);

$this->menu=array(
	array('label'=>'Create GEStatus', 'url'=>array('create')),
	array('label'=>'Manage GEStatus', 'url'=>array('admin')),
);
?>

<h1>Gestatuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
