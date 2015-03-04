<?php
/* @var $this ContactsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gecontacts',
);

$this->menu=array(
	array('label'=>'Create GEContact', 'url'=>array('create')),
	array('label'=>'Manage GEContact', 'url'=>array('admin')),
);
?>

<h1>Gecontacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
