<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 20% !important;
	}
</style>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){		
	$('#gelead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});	
	return false;
});
$('.reset-search').click(function(){
	$('#form-search')[0].reset();
	$('#gelead-grid').yiiGridView('update', {
		data: $('#form-search').serialize()
	});
});
");
?>
<div class="row">
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="#" data-toggle="tooltip" title="" data-original-title="ACTIVE LEADS" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="gi gi-wallet"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::getAllDataActiveLeadByAgent());?></strong>
			<br>
			<small>ACTIVE LEADS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="#" data-toggle="tooltip" title="" data-original-title="POTENTIAL COMMISSIONS" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countPotentialCommissionLead());?></strong>
			<br>
			<small>POT. COMMISSIONS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="#" data-toggle="tooltip" title="" data-original-title="HOT DEALS" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countHotLead());?></strong>
			<br>
			<small>HOT LEADS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="#" data-toggle="tooltip" title="" data-original-title="WARM LEADS" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countWarmLead());?></strong>
			<br>
			<small>WARM LEADS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<!---->


</div>
<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Lead List</strong></h2>
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
										'id'=>'gelead-grid',
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
											'lead_name',
											'lead_email',
											'phone',
											'cell_phone',
											'address',
											//'coverage_id',
											/*
											'city',
											'country_id',
											'zip_code',
											'gender',
											'product_id',
											'status_id',
											'agent_id',
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
										           	/*
										           	'update' => array(
								                		'options' => array('rel' => 'tooltip', 'class' => 'btn btn-sm btn-primary'),
								                		'label' => 'Tab',
								                		'url'=>'Yii::app()->createUrl("adminou/pagetab/admin/", array("page"=>$data->id))',
								                		'imageUrl' => false,
										           	),*/
										           	/*
								            		'update' => array(
								                		'options' => array('rel' => 'tooltip', 'class' => 'btn btn-primary'),
								                		'label' => 'Edit',
								                		'imageUrl' => false,
										           ),*/
										           /*
										           'delete' => array(
								                		'options' => array('rel' => 'tooltip', 'class' => 'btn btn-danger'),
								                		'label' => 'Delete',
								                		'imageUrl' => false,
										           ),*/
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