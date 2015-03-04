<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 20% !important;
	}
</style>
<?php
/* @var $this ContactsController */
/* @var $model GEContact */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gecontact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.reset-search').click(function(){
	$('#form-search')[0].reset();
	$('#gecontact-grid').yiiGridView('update', {
		data: $('#form-search').serialize()
	});
});
");
?>

 
<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Contacts List</strong></h2>
            </div>
            <?php echo CHtml::ajaxButton(
        		' Add New ', 
        		array($this->id.'/create'), 
        		array('update' => ".view-x",
				'beforeSend' => 'function(){
      				
				}',
				'complete' => 'function(){
					$(".modal-dialog").css({"width":"98%"});
					//$(".modal,.modal-backdrop,#myModal").show();
					return false;
				}',
				),
        		array('class'=>'btn btn-x btn-default')
			);?>
			
			<a class="btn btn-success btn-md sync-gmail" href="#"><span class="label-google">Take contact from google</span> <i class="fa fa-google"></i></a>
			<a href="#" class="btn btn-default btn-lg search-button fa fa-search" style="float: right;">Search</a>
			 
			<div class="search-form" style="display: none;">
				<?php $this->renderPartial("_search",array('model'=>$model));?>
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
										'id'=>'gecontact-grid',
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
											'contact_name',
											'contact_email',
											'phone',
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
											'premium',
											'commission',
											'renewal',
											'bonus_commission',
											'bonus_renewal',
											'coverage_id',
											'is_active',
											'temperature_id',
											*/
											array(
												'class'=>'CButtonColumn',
												'template'=>'{view} {note} {update} {task}',
												'buttons'=>array(	
													'view' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick View Detail','rel' => 'tooltip', 'class' => 'btn btn-x btn-sm btn-default'),
								                		'label' => '<i class="fa fa-search-plus"></i>',
								                		'click'=>"function(){															
													       	$('.view-x').load($(this).attr('href'),function(){
										                   		$('.modal-dialog').css({'width':'98%'});		
									                        });
															return false;
														}",			
								                		'imageUrl' => false,
										           ),			            	 
								            		'note' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick Note','rel' => 'tooltip', 'class' => 'btn btn-x2 btn-sm btn-default'),
								                		'label' => '<i class="fa fa-pencil-square-o"></i>',		
								                		'url'=>'Yii::app()->createUrl("'.$this->id.'/note/", array("id"=>$data->id))',
								                		'click'=>"function(){															 
													       	$('.view-x').load($(this).attr('href'),function(){
										                   		$('.modal-dialog').css({'width':'50%'});		
									                        });
															return false;
														}",	
								                		'imageUrl' => false,
										           	),
										           	
								            		'update' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick Edit','rel' => 'tooltip', 'class' => 'btn btn-x btn-sm btn-default'),
								                		'label' => '<i class="fa fa-pencil"></i>',
								                		'imageUrl' => false,
								                		 
										            ),
										            'task' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick Task','rel' => 'tooltip', 'class' => 'btn btn-x2 btn-sm btn-default'),
								                		'label' => '<i class="fa fa-calendar"></i>',
								                		
								                		'url'=>'Yii::app()->createUrl("'.$this->id.'/task/", array("id"=>$data->id))',
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
<script>
	$(function(){
		$(".sync-gmail").click(function(){
			$(".sync-gmail").attr({'disabled':true});
			$(".label-google").html('Taking contact from google');
			var data2 = "limit=500";
			$.post("<?php echo $this->baseUrl().'/'.$this->id;?>/syncgoogle",function(response){
				if(response.success==true){
					$('#gecontact-grid').yiiGridView('update', {
						data: $(this).serialize()
					});
					$(".label-google").html('Successed');
					//window.location.reload(true);
				}
				$(".sync-gmail").attr({'disabled':false});
				$(".label-google").html('Take contact from google');
			},'json');
			return false;
		});
		/*
		jQuery('#gecontact-grid').yiiGridView({
			'ajaxUpdate':['gecontact-grid'],
			'ajaxVar':'ajax',
			'pagerClass':'dataTables_paginate paging_bootstrap text-center',
			'loadingClass':'grid-view-loading',
			'filterClass':'filters',
			'tableClass':'table table-striped table-vcenter remove-margin-bottom',
			'selectableRows':1,
			'enableHistory':false,
			'updateSelector':'{page}, {sort}',
			'filterSelector':'{filter}',
			'pageVar':'GEContact_page',
			'afterAjaxUpdate':modal});*/
	});
</script>