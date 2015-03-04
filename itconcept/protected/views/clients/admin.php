<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 5% !important;
	}
</style>
<?php
/* @var $this ClientsController */
/* @var $model GEClient */

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
$('.reset-search').click(function(){
	$('#form-search')[0].reset();
	$('#geclient-grid').yiiGridView('update', {
		data: $('#form-search').serialize()
	});
});
");
?>
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<!-- Widget -->
		<a href="#" data-toggle="tooltip" title="" data-original-title="ACTIVE CLIENTS" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="gi gi-wallet"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countActiveClientByAgent());?></strong>
			<br>
			<small>ACTIVE CLIENTS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-6">
		<!-- Widget -->
		<a href="#" data-toggle="tooltip" title="" data-original-title="POTENTIAL RENEWALS" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countPotentialRenewalClientByAgent());?></strong>
			<br>
			<small>POT. RENEWALS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Client List</strong></h2>
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
									'id'=>'geclient-grid',
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
									'afterAjaxUpdate'=>'modal',
									'dataProvider'=>$model->search(),
									//'filter'=>$model,
									'columns'=>array(
										'id',
										'client_name',
										'client_email',
										'phone',
										'cell_phone',
										'address',
										array(
											'class'=>'CButtonColumn',
											'template'=>'{view}',
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