<?php
/* @var $this EmailtemplatesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geemail Templates',
);

$this->menu=array(
	array('label'=>'Create GEEmailTemplate', 'url'=>array('create')),
	array('label'=>'Manage GEEmailTemplate', 'url'=>array('admin')),
);
?>

<h1>Geemail Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
