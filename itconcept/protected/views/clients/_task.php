<?php
$this->avoidDoubleLoadJs();
/* @var $this LeadsController */
/* @var $model GELead */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="block">
        <div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2> | <h2 style="float: right;">Receiver : <strong><?php echo $receiver->client_name;?></strong></h2>
        </div>
        <div class="form">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>$modelName.'-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableClientValidation'=>true,
                'enableAjaxValidation'=>false,

            )); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->errorSummary($model); ?>



            <div class="form-group">
            	<div class="col-md-12">
	                <?php echo $form->labelEx($model,'description'); ?>
	                <?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
	                <?php echo $form->error($model,'description'); ?>
	                <?php echo $form->hiddenField($model,'client_id',array('class'=>'form-control','value'=>$receiver->id)); ?>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="form-group">
            	<div class="col-md-4">
	            	<?php echo $form->labelEx($model,'date'); ?>
	                <?php echo $form->textField($model,'date',array('class'=>'form-control datepicker','placeholder'=>'DD/MM/YY')); ?>
	                <?php echo $form->error($model,'date'); ?>
            	</div>
            	<div class="col-md-8">
	            	<?php echo $form->labelEx($model,'time',array("style"=>"padding-left: 15px;")); ?>
	            	<div class="col-md-4">
		                <select name="GETask[H]" class="form-control">
		                	<?php for($i=1;$i<=12;$i++){?>
		                		<option value="<?php echo $i;?>"><?php echo $i;?></option>
		                	<?php } ?>
		                </select>
	                </div>
	                <div class="col-md-4">
		                <select name="GETask[I]" class="form-control">
		                	<option>00</option>
		                	<option>15</option>
		                	<option>30</option>
		                	<option>45</option>
		                </select>
	                </div>
	                <div class="col-md-4">
		                <select name="GETask[A]" class="form-control">
		                	<option value="am">AM</option>
		                	<option value="pm">PM</option>
		                </select>
	                </div>
	                <?php echo $form->error($model,'time'); ?>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <div class="form-group">
            	<div class="col-md-12">
	            	<small>We'll send an email early in the monrning on this day</small>
	            	<br><br>
            	</div>
            	<div class="clearfix"></div>
            	<div class="col-md-6">
            		<?php echo $form->labelEx($model,'agent_id'); ?>
                	<?php echo $form->dropDownList($model,'agent_id',CHtml::listData(GEAgent::model()->findAll(
						array(
							'order'=>'first_name ASC'
						)
					),'id','full_name'),array('class'=>'form-control')); ?>
                	<?php echo $form->error($model,'agent_id'); ?>
            	</div>
            	<div class="col-md-6">
            		<?php echo $form->labelEx($model,'event_category_id'); ?>
                	<?php echo $form->dropDownList($model,'event_category_id',CHtml::listData(GECategoryEvent::model()->findAll(
						array(
							'order'=>'event_name ASC'
						)
					),'id','event_name'),array('class'=>'form-control')); ?>
                	<?php echo $form->error($model,'event_category_id'); ?>
            	</div>
            	<div class="clearfix"></div>
            </div>
            
            



            <div class="form-group">
                <?php echo CHtml::Button($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','id'=>'save')); ?>
                <?php echo CHtml::Button('Cancel',array('class'=>'btn btn-danger',"data-dismiss"=>"modal")); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>
<script>
    $(function(){
    	$('.datepicker').datepicker({ 
			format:'dd/mm/yyyy', 
			todayHighlight: true 
		});
        $("#save").click(function(){
            $("#save").attr({
                'value':'<?php echo $model->isNewRecord ? 'Creating...' : 'Saving...';?>',
                'disabled':true,
            });

            $.post($("#<?php echo $modelName;?>-form").attr("action"),$("#<?php echo $modelName;?>-form").serialize(),function(response){
                if(response.success==true){
                    $(".errorMessage").hide();
                    $(".error").removeClass('error');
                    //$(".modal,.modal-backdrop").hide();
                    $('#myModal').modal('hide');

                    $('#<?php echo $modelName?>-grid').yiiGridView('update', {
                        data: $(this).serialize()
                    });

                }else{
                    if(response.GETask_description){
                        $("#GETask_description").addClass('error');
                        $("#GETask_description_em_").html(response.GETask_description).show();
                    }else{
                        $("#GETask_description").removeClass('error');
                        $("#GETask_description_em_").hide();
                    }
                    
                    if(response.GETask_date){
                        $("#GETask_date").addClass('error');
                        $("#GETask_date_em_").html(response.GETask_date).show();
                    }else{
                        $("#GETask_date").removeClass('error');
                        $("#GETask_date_em_").hide();
                    }
                    
                    if(response.GETask_time){
                        $("#GETask_time").addClass('error');
                        $("#GETask_time_em_").html(response.GETask_time).show();
                    }else{
                        $("#GETask_time").removeClass('error');
                        $("#GETask_time_em_").hide();
                    }
                    
                    if(response.GETask_event_category_id){
                        $("#GETask_event_category_id").addClass('error');
                        $("#GETask_event_category_id_em_").html(response.GETask_event_category_id).show();
                    }else{
                        $("#GETask_event_category_id").removeClass('error');
                        $("#GETask_event_category_id_em_").hide();
                    }
                    if(response.GETask_agent_id){
                        $("#GETask_agent_id").addClass('error');
                        $("#GETask_agent_id_em_").html(response.GETask_agent_id).show();
                    }else{
                        $("#GETask_agent_id").removeClass('error');
                        $("#GETask_agent_id_em_").hide();
                    }
                    
                    
                    
                }
                $("#save").attr({
                    'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>',
                    'disabled':false,
                });
            },'json');

        });
    });
</script>