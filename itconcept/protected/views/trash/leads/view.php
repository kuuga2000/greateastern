<?php
/* @var $this LeadsController */
/* @var $model GELead */

$this->breadcrumbs=array(
	'Geleads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GELead', 'url'=>array('index')),
	array('label'=>'Create GELead', 'url'=>array('create')),
	array('label'=>'Update GELead', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GELead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GELead', 'url'=>array('admin')),
);
?>

<h1>View GELead #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lead_name',
		'lead_email',
		'phone',
		'cell_phone',
		'address',
		'city',
		'country_id',
		'zip_code',
		'gender',
		'product_id',
		'status_id',
		'agent_id',
	),
)); ?>
