<?php
/* @var $this LeadsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geleads',
);

$this->menu=array(
	array('label'=>'Create GELead', 'url'=>array('create')),
	array('label'=>'Manage GELead', 'url'=>array('admin')),
);
?>

<h1>Geleads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
