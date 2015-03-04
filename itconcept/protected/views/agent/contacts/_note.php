<?php
$this->avoidDoubleLoadJs();
/* @var $this LeadsController */
/* @var $model GELead */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="block">
        <div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2> | <h2 style="float: right;">Receiver : <strong><?php echo $receiver->contact_name;?></strong></h2>
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
                <?php echo $form->labelEx($model,'note'); ?>
                <?php echo $form->textArea($model,'note',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'note'); ?>
                <?php echo $form->hiddenField($model,'to_client_id',array('class'=>'form-control','value'=>$receiver->id)); ?>
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
                    if(response.GENote_note){
                        $("#GENote_note").addClass('error');
                        $("#GENote_note_em_").html(response.GENote_note).show();
                    }else{
                        $("#GENote_note").removeClass('error');
                        $("#GENote_note_em_").hide();
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