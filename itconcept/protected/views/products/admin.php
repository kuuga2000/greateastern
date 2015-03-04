<?php
/* @var $this ProductsController */
/* @var $model GEProduct */
 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#geproduct-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 20% !important;
	}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Products List</strong></h2>
            </div>
            <?php echo CHtml::ajaxButton(
        		' Add New ', 
        		array($this->id.'/create'), 
        		array('update' => ".view-x",
				'beforeSend' => 'function(){
      				
				}',
				'complete' => 'function(){
      				
					$(".modal-dialog").css({"width":"50%"});
					//$(".modal,.modal-backdrop,#myModal").show();
					return false;
      				 
				}',
				),
        		array('class'=>'btn btn-x btn-default')
			);?>
			
            <div class="col-sm-11 col-lg-12">
                <!-- Tickets Block -->
                    <!-- Tabs Content -->
                     
                        <!-- Tickets List -->
                        <div id="tickets-list" class="tab-pane active">
                        	<br><br>
                            <div class="block-content-full">
                                <div class="table-responsive remove-margin-bottom">

								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'geproduct-grid',
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
									'filter'=>$model,
									'columns'=>array(
										'id',
										'product_name',
										array(
											'name'=>'coverage_id',
											'value'=>'$data->coverage_type',
										),
										array(
											'name'=>'commission',
											'value'=>function($data){
												return $data->display_commission;
											}
										),
										array(
											'name'=>'renewal',
											'value'=>function($data){
												return $data->display_renewal;
											}
										),
										array(
											'class'=>'CButtonColumn',
											'template'=>'{update}',
											'buttons'=>array(				            	 
							            		 
									           	
							            		'update' => array(
							                		'options' => array('title'=>'Quick Edit','rel' => 'tooltip', 'class' => 'btn btn-x btn-xs btn-default'),
							                		'label' => '<i class="fa fa-pencil"></i>',
							                		'imageUrl' => false,
							                		'click'=>"function(){
														//$('.loading-x').show();
												       	$('.view-x').load($(this).attr('href'),function(){
									                   		$('.modal-dialog').css({'width':'50%'});		
								                        });
														return false;
													}",			
									            ),
									             
									           
									           'delete' => array(
							                		'options' => array('title'=>'Delete','rel' => 'tooltip', 'class' => 'btn btn-xs btn-danger'),
							                		'label' => '<i class="fa fa-times"></i>',
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
 