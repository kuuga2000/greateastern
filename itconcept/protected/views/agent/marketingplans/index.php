<?php
/* @var $this MarketingplansController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geemail Marketings',
);

$this->menu=array(
	array('label'=>'Create GEEmailMarketing', 'url'=>array('create')),
	array('label'=>'Manage GEEmailMarketing', 'url'=>array('admin')),
);
?>

<h1>Geemail Marketings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
