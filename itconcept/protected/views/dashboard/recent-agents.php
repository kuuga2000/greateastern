<div class="row">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Top 10 Agents</strong></h2>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-12">
                    <button def="weekly" class="btn btn-sm btn-primary filter" type="submit">Weekly</button>
                    <button def="monthly" class="btn btn-sm btn-primary filter" type="button">Monthly</button>
                    <button def="6months" class="btn btn-sm btn-primary filter" type="button">6 Months</button>
                    <button def="1year" class="btn btn-sm btn-default filter" type="button">1 Year</button>
                </div>
            </div>
            <div class="col-sm-11 col-lg-12">               
            	<br><br>
                <div class="table-responsive remove-margin-bottom">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'geagent-grid',
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
						//'filter'=>$model,
						'columns'=>array(
							'id',
							array(
								'header'=>'Full Name',
								'name'=>'first_name',
								'value'=>'$data->full_name'
							),
							'email',
							array(
								'header'=>'Total Lead',
								'name'=>'id',
								'value'=>function($data){
									echo count(Tools::getAllDataLeadByAgent2($data->id));
								}
							),
							array(
								'header'=>'Total Customers',
								'name'=>'id',
								'value'=>function($data){
									echo count(Tools::getAllDataClientByAgent2($data->id));
								}
							),
							/*array(
								'name'=>'country_id',
								'header'=>'Country',
								'value'=>'$data->display_country'
							),*/
							/*
							'city',
							'country_id',
							'zip_code',
							'gender',
							'product_id',
							'status_id',
							'agent_id',
							*/
							
							 
						),
					)); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script src="<?php echo $this->baseHref();?>/themes/greateast/js/highcharts.js"></script>
<script src="<?php echo $this->baseHref();?>/themes/greateast/js/exporting.js"></script>
<div id="STATISTIC"></div>
<script>
	$(function(){
		$.get('<?php echo $this->baseUrl().'/'.$this->id;?>/statistic',function(data){
			 $("#STATISTIC").html(data);
		});
		$(".filter").click(function(){
			$('.filter').addClass('btn-primary');
			$('.filter').removeClass('btn-default');
			$(this).removeClass('btn-primary');
			$(this).addClass('btn-default');
			var data = 'Filter[by]='+$(this).attr('def');
			$.get('<?php echo Yii::app() -> createUrl($this -> route);?>',data,function(){
				$('#geagent-grid').yiiGridView('update', {
					data: data
				});
			});
			$.get('<?php echo $this->baseUrl().'/'.$this->id;?>/statistic',data,function(data){
				 $("#STATISTIC").html(data);
			});
			return false;
		});
	});
</script>