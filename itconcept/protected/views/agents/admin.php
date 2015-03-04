<?php
/* @var $this AgentsController */
/* @var $model GEAgent */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#geagent-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.reset-search').click(function(){
	$('#form-search')[0].reset();
	$('#geagent-grid').yiiGridView('update', {
		data: $('#form-search').serialize()
	});
});
");
?>
<style>
    .suspand{
    	color:#E74C3C !important;
    }
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
                <h2><strong><?php echo $title;?></strong></h2>
            </div>
            <?php echo CHtml::ajaxButton(
        		' Add New ', 
        		array($this->id.'/create'), 
        		array('update' => ".view-x",
				'beforeSend' => 'function(){
      				$(".btn-x").attr({"value":"Loading...","disabled":true});
				}',
				'complete' => 'function(){
      				$(".btn-x").attr({"value":" Add New ","disabled":false});
					$(".modal-dialog").css({"width":"98%"});
					//$(".modal,.modal-backdrop,#myModal").show();
					return false;
      				 
				}',
				),
        		array('class'=>'btn btn-x btn-default')
			);?>
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
                            	<div class="alert alert-success alert-dismissable" style="display: none;">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <h4><i class="fa fa-check-circle"></i> Success</h4> <span class="message-flash"></span>!
                                </div>
                                <div class="table-responsive remove-margin-bottom">
									<?php $this->widget('zii.widgets.grid.CGridView', array(
										'id'=>'geagent-grid',
										//'rowCssClass'=>array('odd','even'),
    									
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
										//'rowCssClass'=>array('odd','even'),
										'rowCssClassExpression'=>'$data->is_active==0?"suspand":""',
										'afterAjaxUpdate'=>'modal',
										//'filter'=>$model,
										'columns'=>array(
											'id',
											array(
												'value'=>'Name',
												'name'=>'first_name',
												'value'=>'$data->full_name',
											),
											'phone',
											'email',
											array(
												'name'=>'cell',
												'value'=>'$data->cell',
												'header'=>'Mobile',
											),
											array(
											'class'=>'CButtonColumn',
											'template'=>'{detail} {view} {update} {suspend}',
											'buttons'=>array(
												'detail' => array(
													'options' => array('title'=>'detail','rel' => 'tooltip', 'class' => 'btn btn-xs btn-default'),
								                	'label' => '<i class="hi hi-resize-full"></i>',
								                	'url'=>'Yii::app()->createUrl("agents/detail", array("id"=>$data->id))',		
								                	'imageUrl' => false,
										        ),
							            		'view' => array(
								                	'options' => array('title'=>'view','rel' => 'tooltip', 'class' => 'btn btn-x btn-xs btn-default'),
								                	'label' => '<i class="fa fa-search-plus"></i>',
								                	'click'=>"function(){
												   		$('.view-x').load($(this).attr('href'),function(){
										               		$('.modal-dialog').css({'width':'98%'});		
									                    });
													    return false;
													}",			
								                	'imageUrl' => false,
										        ),
									           	
							            		'update' => array(
							                		'options' => array('title'=>'Quick Edit','rel' => 'tooltip', 'class' => 'btn btn-x btn-xs btn-default'),
							                		'label' => '<i class="fa fa-pencil"></i>',
							                		'imageUrl' => false,
							                		'click'=>"function(){
														//$('.loading-x').show();
												       	$('.view-x').load($(this).attr('href'),function(){
									                   		$('.modal-dialog').css({'width':'98%'});		
								                        });
														return false;
													}",			
									            ),
									            
									           'suspend' => array(
									           		//'cssClassExpression' => '$data->is_active==0 ? "ff" : "" ',
							                		'options' => array('title'=>'Suspend this agent','rel' => 'tooltip', 'class' => 'btn btn-xs btn-danger suspend'),
							                		'label' => '<i class="fa fa-pause"></i>',
							                		'imageUrl' => false,
							                		'url'=>'Yii::app()->createUrl("agents/suspend", array("id"=>$data->id))',
									           ), 
									           /*
									           'delete' => array(
							                		'options' => array('title'=>'Delete','rel' => 'tooltip', 'class' => 'btn btn-sm btn-danger'),
							                		'label' => '<i class="fa fa-times"></i>',
							                		'imageUrl' => false,
									           ), */
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
 