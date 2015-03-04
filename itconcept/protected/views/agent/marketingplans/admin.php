<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 20% !important;
	}
</style>
<?php
/* @var $this MarketingplansController */
/* @var $model GEEmailMarketing */
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#geemail-marketing-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Marketing Plan</strong></h2>
            </div>
            <?php echo CHtml::ajaxLink(
        		' <i class="fa fa-plus"></i> Add New ', 
        		array('agent/marketingplans/create'), 
        		array('update' => ".view-x",
				'beforeSend' => 'function(){
      				
				}',
				'complete' => 'function(){
					$(".modal-dialog").css({"width":"98%"});
					//$(".modal,.modal-backdrop,#myModal").show();
					return false;
				}',
				),
        		array('class'=>'btn btn-x btn-info')
			);?>
			
			 
			<div class="search-form" style="display: none;">
				<?php //$this->renderPartial("_search",array('model'=>$model));?>
			</div>
			
            <div class="col-sm-11 col-lg-12">
                <!-- Tickets Block -->
                    <!-- Tabs Content -->
                     
                        <!-- Tickets List -->
                        <div id="tickets-list" class="tab-pane active">
                        	<br><br>
                            <div class="block-content-full">
                                <div class="table-responsive remove-margin-bottom">
									<?php $this->widget('zii.widgets.grid.CGridView', array(
										'id'=>$modelName.'-grid',
										'dataProvider'=>$model->search(),
										//'filter'=>$model,
										'pager' => array(
										 	'class' => 'CLinkPager', 
										 	'selectedPageCssClass'=>'active',
										 	'header' => '',
										 	'nextPageLabel'=>'<i class="gi gi-forward"></i>',
										 	'lastPageLabel'=>'<i class="gi gi-fast_forward"></i>',
										 	'firstPageLabel'=>'<i class="gi gi-fast_backward"></i>',
										 	'prevPageLabel'=>'<i class="gi gi-rewind"></i>',
									        'htmlOptions'=>array(
									            'class'=>'pagination',
									            'id'=>FALSE,
									        ),
									    ),
									    'pagerCssClass'=>'dataTables_paginate paging_bootstrap text-center',
										'itemsCssClass'=>'table table-striped table-vcenter remove-margin-bottom',
										'dataProvider'=>$model->search(),
										'afterAjaxUpdate'=>'modal',
										'columns'=>array(
											'id',
											array(
												'name'=>'marketing_plan_name',
												'value'=>'$data->marketing_plan_name',
												'header'=>'Name'
											),
											//'select_recipients',
											//'send_with_temperature',
											//'send_with_status',
											//'send_with_coverage',
											//'send_with_carrier',
											array(
												'header'=>'Template',
												'value'=>function($data){
													return $data->display_template->template_name;
												},
												'name'=>'template_id',
											),
											array(
												'header'=>'Email Subject',
												'value'=>function($data){
													return $data->display_template->email_subject_line;
												},
												'name'=>'template_id',
											),
											array(
												'header'=>'Interval',
												'name'=>'send_after',
												'value'=>function($data){
													return $data->send_after.' '.$data->time_name;
												}
											),
											array(
												'header'=>'Status',
												'name'=>'send_after',
												'value'=>function($data){
													return $data->is_active==1 ? "On" : "Off";
												}
											),
											/*
											'send_with_product',
											'template_id',
											'send_after',
											'time_name',
											*/
											array(
												'class'=>'CButtonColumn',
												'template'=>'{update} {delete}',
												'buttons'=>array(	
								            		'update' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick Edit','rel' => 'tooltip', 'class' => 'btn btn-x2 btn-xs btn-default'),
								                		'label' => '<i class="fa fa-pencil"></i>',
								                		'url'=>'Yii::app()->createUrl("agent/marketingplans/update", array("id"=>$data->id))',
								                		'click'=>"function(){															
													       	$('.view-x').load($(this).attr('href'),function(){
										                   		$('.modal-dialog').css({'width':'98%'});	
																 
									                        });
															return false;
														}",
								                		'imageUrl' => false,
										            ),
										            'delete' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick Delete','rel' => 'tooltip', 'class' => 'btn btn-xs btn-danger'),
								                		'label' => '<i class="fa fa-times"></i>',
								                		'url'=>'Yii::app()->createUrl("agent/marketingplans/delete", array("id"=>$data->id))',
								                		'imageUrl' => false,
										            ),
										             
												)
											  ),
										),
									)); ?>
								</div>
                            </div>
                        </div>
                        <!-- END Tickets List -->
                     
                    <!-- END Tabs Content -->
               
                <!-- END Tickets Block -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>