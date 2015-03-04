<?php
/* @var $this AgentsController */
/* @var $model GEAgent */

$this->breadcrumbs=array(
	'Geagents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GEAgent', 'url'=>array('index')),
	array('label'=>'Create GEAgent', 'url'=>array('create')),
	array('label'=>'Update GEAgent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GEAgent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GEAgent', 'url'=>array('admin')),
);
?>

<h1>View GEAgent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'phone',
		'cell',
		'fax_number',
		'email',
		'address',
		'city',
		'country_id',
		'zip_code',
		'date_of_birth',
		'username',
		'password',
		'user_type',
	),
)); ?>
