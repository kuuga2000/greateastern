 
<div class="content-header">
	<div class="header-section">
		<h1><i class="fa fa-calendar"></i><!--Calendar-->
		<br>
		<small><!--An awesome calendar for your events!--></small></h1>
	</div>
</div>
<ul class="breadcrumb breadcrumb-top">
	<li>
		Boarding
	</li>
	<li>
		<a href="">Calendar</a>
	</li>
</ul>
<!-- END Calendar Header -->
<!-- FullCalendar Content -->
<div class="block block-alt-noborder full">
	<div class="row">
		<div class="col-md-3">
			<div class="block-section">
				<!-- Add event functionality (initialized in js/pages/compCalendar.js) -->
				<form>
					<div class="input-group">
						<div class="input-group-btn">
							<button type="submit" id="add-event-btn" class="btn btn-primary">
								<i class="gi gi-plus"></i> Add New 
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-11 col-lg-12 pull-right">
				<div class="block full">
					<div class="block-title clearfix">
						<h2><i class="fa fa-ticket"></i> Filter <strong></strong></h2>
					</div>
					<form action="">
						<div class="col-sm-6 col-lg-5">
							<h5>Status :</h5>
							<select class="form-control">
								<option value="">--All--</option>
								<option value="">Today's Boarding</option>
								<option value="">Pending</option>
								<option value="">Check-Out</option>
								<option value="">Check-In</option>
								<option value="">Paid</option>
							</select>
						</div>
						<div class="col-sm-6 col-lg-5">
							<h5>Rooms :</h5>
							<select class="form-control">
								<option value="">--Any Rooms--</option>
								<option value="">ROOM A</option>
								<option value="">ROOM B</option>
								<option value="">ROOM C</option>
								<option value="">ROOM D</option>
							</select>
						</div>
						<div class="col-sm-3 col-lg-2">
							<h5>&nbsp;</h5>
							<input type="button" class="btn btn-sm btn-primary" value="Filter" />
						</div>
					</form>
					<div class="clearfix"></div>
				</div>
			</div>
		<div class="col-md-12">
			<!-- FullCalendar (initialized in js/pages/compCalendar.js), for more info and examples you can check out http://arshaw.com/fullcalendar/ -->
			<div id="calendar"></div>
			
		</div>
	</div>
</div>
 