<?php
/* @var $this EmailsentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geemail Sents',
);

$this->menu=array(
	array('label'=>'Create GEEmailSent', 'url'=>array('create')),
	array('label'=>'Manage GEEmailSent', 'url'=>array('admin')),
);
?>

<h1>Geemail Sents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
