<style>
	.progress, .progress-bar {
    height: 20px;
    line-height: 20px;
}
</style>
<div class="row" id="bg">
    <div class="col-md-12">
        <div class="block full">
            <div class="block-title">
                <h2><strong>Background</strong></h2>
            </div>
            <div class="col-sm-11 col-lg-12">
                 <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="fileuploadbg" type="file" name="files[]" multiple>
				</span>
				<br><br>
				 
			    <!-- The global progress bar -->
			    <div id="progress" class="progress">
			        <div class="progress-bar progress-bar-success pro"></div>
			    </div>
			    <!-- The container for the uploaded files -->
			    <div id="filesbg" class="files"></div>
			    <span class="view-bg-x"></span>
			    <br><br>
				<span class="view-bg">
					<?php
					if(!empty($bg)){
					foreach($bg as $bG):
					?>
					<div id="img-<?php echo $bG->id;?>">
					<img width="500" src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $bG->background;?>" style="float:left;">
					&nbsp;&nbsp;<a href="#bg" onclick="return confirm('are you sure?');" class="removeImage" title="remove" rel="img-<?php echo $bG->id;?>" def="<?php echo $bG->id;?>"><i class="fa fa-trash"></i></a>
					<div class="clearfix"></div>
					<br>
					</div>
					<?php 
					endforeach;
					}
					?>
				</span>
				<div class="clearfix"></div>
				
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/assets/uploads/';
    $('#fileuploadbg').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#filesbg');
                $(".view-bg-x").append('<div class="clearfix"></div><img style="float:left;" width="500" src="<?php echo $this->baseUrl();?>/assets/uploads/images/'+file.name+'"><div class="clearfix"></div><br>');
            	$.post('<?php echo $this->baseUrl();?>/config/addbg/id/<?php echo Yii::app()->user->id;?>','image='+file.name,function(response){
            		
            	},'json')
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .pro').css({
                'width':
                progress + '%'}
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
        
    $(".removeImage").click(function(){
    	var id = $(this).attr('def');
    	var rel = $(this).attr('rel');
    	$.post('<?php echo $this->baseUrl();?>/file/remove/id/'+id,function(response){
    		if(response.success==true){
    			$("#"+rel).remove();
    		}
    	},'json');
    });
        
});
</script>