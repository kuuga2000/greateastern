<div class="row">
	<div class="col-md-12">
		<div class="block full">
			<div class="block-title">
				<h2><strong>Logo</strong></h2>
			</div>
			<div class="col-sm-11 col-lg-12">
				<span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Select files...</span> <!-- The file input field used as target for the file upload widget -->
					<input id="fileupload" type="file" name="files[]" multiple>
				</span>
				<span class="view-logo">
					<?php
					if(!empty($logo->logo)){
					?>	
					<img width="135" height="90" src="<?php echo $this->baseUrl();?>/assets/uploads/images/<?php echo $logo->logo;?>" style="float:right;">
					<?php }?>
				</span>
				<div class="clearfix"></div>
				<br>
			    <br>
			    <!-- The global progress bar -->
			    <div id="progress" class="progress">
			        <div class="progress-bar progress-bar-success"></div>
			    </div>
			    <!-- The container for the uploaded files -->
			    <div id="files" class="files"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<script src="<?php echo $this->baseHref();?>/ext/j-file-upload/js/jquery.fileupload.js"></script>
<script>
	$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '<?php echo $this->baseUrl();?>/assets/uploads/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
                $(".view-logo").html('<img style="float:right;" width="135" height="90" src="<?php echo $this->baseUrl();?>/assets/uploads/images/'+file.name+'">');
            	$.post('<?php echo $this->baseUrl();?>/config/changelogo/id/<?php echo Yii::app()->user->id;?>','image='+file.name,function(response){
            		
            	},'json')
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>