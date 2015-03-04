<div class="row">
    <div class="col-md-12">
		<?php $this->renderPartial('view',array('model'=>$model,'title'=>$title));?>
	</div>
</div>
<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 5% !important;
	}
</style>
<div class="row">
    <div class="col-md-13">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Contacts</strong></h2>
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
										'dataProvider'=>$modelContact->search(),
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
										'afterAjaxUpdate'=>'modal',
										'columns'=>array(
											'id',
											'contact_name',
											'contact_email',
											'phone',
											array(
												'class'=>'CButtonColumn',
												'template'=>'{view}',
												'buttons'=>array(	
													'view' => array(
								                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick View Detail','rel' => 'tooltip', 'class' => 'btn btn-x btn-sm btn-default'),
								                		'label' => '<i class="fa fa-search-plus"></i>',
								                		'url'=>'Yii::app()->createUrl("'.$this->id.'/view_contact/", array("id"=>$data->id))',
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
<div class="row">
    <div class="col-md-13">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Clients</strong></h2>
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
									 'dataProvider'=>$modelClient->search(),
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
							                		'url'=>'Yii::app()->createUrl("'.$this->id.'/view_client/", array("id"=>$data->id))',
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
<div class="row">
    <div class="col-md-13">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Leads</strong></h2>
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
										'dataProvider'=>$modelLead->search(),
										'afterAjaxUpdate'=>'modal',
										//'filter'=>$model,
										'columns'=>array(
											'id',
											'lead_name',
											'lead_email',
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
								                		'url'=>'Yii::app()->createUrl("'.$this->id.'/view_lead/", array("id"=>$data->id))',
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