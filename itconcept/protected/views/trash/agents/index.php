<?php
/* @var $this AgentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geagents',
);

$this->menu=array(
	array('label'=>'Create GEAgent', 'url'=>array('create')),
	array('label'=>'Manage GEAgent', 'url'=>array('admin')),
);
?>

<h1>Geagents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
