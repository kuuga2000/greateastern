<div class="row">
	<div class="col-md-12">
		<div class="block full">
			  <div class="block-title">
                <h2><strong>My Profile</strong></h2>
            </div>
            <?php $this->renderPartial("_viewProfile",array('model'=>$model,'changePassword'=>$changePassword,'modelName'=>get_class($changePassword)),FALSE,TRUE);?>
			<!--
			<ul data-toggle="tabs" class="nav nav-tabs">
				<li class="active">
					<a href="#modal-tabs-profile">Profile</a>
				</li>
				<li class="">
					<a title="" data-toggle="tooltip" href="#modal-tabs-settings" data-original-title="Settings"><i class="fa fa-cogs"></i></a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="modal-tabs-profile" class="tab-pane active">
					<?php //$this->renderPartial("_viewProfile",array('model'=>$model));?>
				</div>
				<div id="modal-tabs-settings" class="tab-pane">
					<?php //$this->renderPartial("_editProfile",array('model'=>$model,'modelName'=>get_class($model)));?>
				</div>
			</div>
		-->
		</div>
	</div>
</div>