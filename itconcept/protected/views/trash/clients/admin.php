<?php
/* @var $this ClientsController */
/* @var $model GEClient */

$this->breadcrumbs=array(
	'Geclients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GEClient', 'url'=>array('index')),
	array('label'=>'Create GEClient', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#geclient-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Geclients</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'geclient-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'client_name',
		'client_email',
		'phone',
		'cell_phone',
		'address',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
