<?php //$this->avoidDoubleLoadJs();?>
<div class="row">
	<div class="col-md-12">
		<div class="block full">
			<div class="block-title">
				<h2><strong>Company Application Data</strong></h2>
			</div>
			<div class="col-sm-11 col-lg-12">
				<div class="row">
					<div class="alert alert-success alert-dismissable" style="display: none;">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4>
                        	<i class="fa fa-check-circle"></i> Success</h4> 
                        	Company Application Data <b class="alert-link">updated</b>!
                    </div>
					<div class="block">
						<div class="form">
							<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'configsite-form',
								// Please note: When you enable ajax validation, make sure the corresponding
								// controller action is handling ajax validation correctly.
								// There is a call to performAjaxValidation() commented in generated controller code.
								// See class documentation of CActiveForm for details on this.
								'action'=>$this->baseUrl().'/config/setting',
								'enableClientValidation'=>true,
								'enableAjaxValidation'=>false,
							)); ?>
							<div class="form-group">
								<div class="col-md-6">
									<?php echo $form->labelEx($model,'name'); ?>
									<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>500,'class'=>'form-control','orival'=>$model->name)); ?>
									<?php echo $form->error($model,'name'); ?>
								</div>
								<div class="col-md-6">
									<?php echo $form->labelEx($model,'title'); ?>
									<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500,'class'=>'form-control','orival'=>$model->title)); ?>
									<?php echo $form->error($model,'title'); ?>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
								<?php
									echo $form->labelEx($model,'description');
									echo $form->textArea($model,'description',array('class'=>'form-control','orival'=>$model->description));
									echo $form->error($model,'description');
								?>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
								<?php
									echo CHtml::Button('Save Change',array('class'=>'btn btn-sm btn-success','id'=>'save'));
								?>
								<?php
									echo CHtml::Button('Reset',array('class'=>'btn btn-sm btn-primary','id'=>'reset'));
								?>
								</div>
								<div class="clearfix"></div>
							</div>
							<?php $this->endWidget(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$("#reset").click(function(){
			$("#ConfigSite_name").val($("#ConfigSite_name").attr('orival'));
			$("#ConfigSite_title").val($("#ConfigSite_title").attr('orival'));
			$("#ConfigSite_description").val($("#ConfigSite_description").attr('orival'));
		});
		$("#save").click(function(){
			$("#save").attr({
				'value':'Saving...',
				'disabled':true,
			});
			$.post($("#configsite-form").attr('action'),$("#configsite-form").serialize(),function(response){
				if(response.success==true){
					$(".alert-success").fadeIn('slow');
				}else{
					if(response.ConfigSite_name){
						$("#ConfigSite_name").addClass('error');
						$("#ConfigSite_name_em_").html(response.ConfigSite_name).show();
					}else{
						$("#ConfigSite_name").removeClass('error');
						$("#ConfigSite_name_em_").hide();
					}
					if(response.ConfigSite_title){
						$("#ConfigSite_title").addClass('error');
						$("#ConfigSite_title_em_").html(response.ConfigSite_title).show();
					}else{
						$("#ConfigSite_title").removeClass('error');
						$("#ConfigSite_title_em_").hide();
					}
					if(response.ConfigSite_description){
						$("#ConfigSite_description").addClass('error');
						$("#ConfigSite_title_em_").html(response.ConfigSite_description).show();
					}else{
						$("#ConfigSite_description").removeClass('error');
						$("#ConfigSite_description_em_").hide();
					}
				}
				$("#save").attr({
					'value':'Save Change',
					'disabled':false,
				});
			},'json');
		});
	})
</script>
