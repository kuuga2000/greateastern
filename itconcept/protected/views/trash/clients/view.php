<?php
/* @var $this ClientsController */
/* @var $model GEClient */

$this->breadcrumbs=array(
	'Geclients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEClient', 'url'=>array('index')),
	array('label'=>'Create GEClient', 'url'=>array('create')),
	array('label'=>'Update GEClient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEClient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEClient', 'url'=>array('admin')),
);
?>

<h1>View GEClient #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_name',
		'client_email',
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
		'height',
		'weight',
		'date_of_birth',
		'policy_number',
		'premium',
		'commission',
		'renewal',
		'bonus_commission',
		'bonus_renewal',
		'coverage_id',
	),
)); ?>
