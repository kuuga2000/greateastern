<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 20% !important;
	}
</style>
<?php
/* @var $this StatusController */
/* @var $model GEStatus */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gestatus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
$('.reset-search').click(function(){
	$('#form-search')[0].reset();
	$('#gestatus-grid').yiiGridView('update', {
		data: $('#form-search').serialize()
	});
});
");
?>

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
					//$(".modal-dialog").css({"width":"98%"});
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
                            	 
                                <div class="table-responsive remove-margin-bottom">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									'id'=>'gestatus-grid',
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
									//'filter'=>$model,
									'columns'=>array(
										'id',
										'description',
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
										                   		$('.modal-dialog').css({'width':'98%'});		
									                        });
															return false;
														}",			
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
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
 
