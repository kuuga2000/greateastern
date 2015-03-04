<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Recent Leads</strong></h2>
            </div>
            <div class="table-responsive remove-margin-bottom">
                <?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'gelead-grid',
					'summaryText'=>'',
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
			                		'url'=>'Yii::app()->createUrl("agent/leads/view/", array("id"=>$data->id))',
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
                                    'url'=>'Yii::app()->createUrl("agent/leads/note/", array("id"=>$data->id))',
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
			                		'url'=>'Yii::app()->createUrl("agent/leads/update/", array("id"=>$data->id))',			                		 
					            ),
					            'task' => array(
			                		'options' => array('data-toggle'=>'tooltip','title'=>'Quick Task','rel' => 'tooltip', 'class' => 'btn btn-x2 btn-sm btn-default'),
			                		'label' => '<i class="fa fa-calendar"></i>',			                		
			                		'url'=>'Yii::app()->createUrl("agent/leads/task/", array("id"=>$data->id))',			                		 
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
            <div class="clearfix"></div>
        </div>
    </div>
</div>