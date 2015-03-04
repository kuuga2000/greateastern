<span id="ccc">
<div class="row">
	<div class="col-md-12">
		<div class="block full">
			<div class="block-title">
				<h2><strong>Calendar</strong></h2>
			</div>
			<!-- FullCalendar Content -->
			<div class="block block-alt-noborder full">
				<div class="row">
					<div class="col-md-3">
						<div class="block-section">
							<div class="input-group">
								<div class="input-group-btn">
									<?php echo CHtml::ajaxButton(
					        		' Add New ', 
					        		array($this->id.'/addevent'), 
					        		array('update' => ".view-x",
									'beforeSend' => 'function(){
					      				
									}',
									'complete' => 'function(){
										$(".modal-dialog").css({"width":"50%"});
										return false;
									}',
									),
					        		array('class'=>'btn btn-x btn-primary')
									);?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div id="calendar"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$this -> renderPartial('_calendar', array(
	'Tasks' => $Tasks, 
	'Notes' => $Notes
	)
);
?>
</span>