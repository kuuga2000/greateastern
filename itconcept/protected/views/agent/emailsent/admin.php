<?php
/* @var $this EmailsentController */
/* @var $model GEEmailSent */

$this->breadcrumbs=array(
	'Geemail Sents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GEEmailSent', 'url'=>array('index')),
	array('label'=>'Create GEEmailSent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#geemail-sent-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Geemail Sents</h1>

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
	'id'=>'geemail-sent-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'select_recipients',
		'send_with_temperature',
		'send_with_status',
		'send_with_coverage',
		'send_with_carrier',
		/*
		'send_with_product',
		'send_sample_to',
		'template_id',
		'from_name',
		'email_subject_line',
		'from_email_address',
		'content_email',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
