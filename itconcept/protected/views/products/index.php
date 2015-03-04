<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geproducts',
);

$this->menu=array(
	array('label'=>'Create GEProduct', 'url'=>array('create')),
	array('label'=>'Manage GEProduct', 'url'=>array('admin')),
);
?>

<h1>Geproducts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
