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
		<a href="">List</a>
	</li>
</ul>
 
<div class="row">
	<div class="col-md-12">
		<div class="block full">
			<div class="block-title">
				<h2><strong>Boardiang</strong> List View</h2>
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
			<div class="col-sm-11 col-lg-12">
			<!-- Tickets Block -->
			<div class="block">
				<!-- Tickets Title -->
				<div class="block-title">
					<div class="block-options pull-right">
						<!--<a title="" data-toggle="tooltip" class="btn btn-alt btn-sm btn-default" href="javascript:void(0)" data-original-title="Settings"><i class="fa fa-cog"></i></a>-->
					</div>
					<ul data-toggle="tabs" class="nav nav-tabs">
						<li class="active"><a href="#tickets-list">Boarding List</a></li>
					</ul>
				</div>
				<!-- END Tickets Title -->
	
				<!-- Tabs Content -->
				<div class="tab-content">
					<!-- Tickets List -->
					<div id="tickets-list" class="tab-pane active">
						<div class="block-content-full">
							<div class="table-responsive remove-margin-bottom">
								<table class="table table-striped table-vcenter remove-margin-bottom">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Status</th>
											<th>Customer Name</th>
											<th>NO. Of Pet</th>
											<th>Pet Type</th>
											<th>Check In</th>
											<th class="text-center">Action</th>
											 
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">#TCK420</td>
											<td><span class="label label-warning">PENDING</span></td>
											<td>Gitoran</td>
											<td>3</td>
											<td>Dog</td>
											<td>23/09/2014 - 28/09/2014</td>
											<td class="text-center">
												<div class="btn-group btn-group-xs">
		                                            <a class="btn btn-default" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
		                                            <a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Delete"><i class="fa fa-times"></i></a>
		                                        </div>
											</td>
										</tr>
										<tr>
											<td class="text-center">#TCK421</td>
											<td><span class="label label-primary">CHECK-IN</span></td>
											<td>Mari</td>
											<td>2</td>
											<td>Dog</td>
											<td>12/09/2014 - 13/09/2014</td>
											<td class="text-center">
												<div class="btn-group btn-group-xs">
		                                            <a class="btn btn-default" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
		                                            <a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Delete"><i class="fa fa-times"></i></a>
		                                        </div>
											</td>
										</tr>
										<tr>
											<td class="text-center">#TCK422</td>
											<td><span class="label label-info">CHECK-OUT</span></td>
											<td>Band Ji Maden</td>
											<td>3</td>
											<td>Cat</td>
											<td>21/09/2014 - 20/09/2014</td>
											<td class="text-center">
												<div class="btn-group btn-group-xs">
		                                            <a class="btn btn-default" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
		                                            <a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Delete"><i class="fa fa-times"></i></a>
		                                        </div>
											</td>
										</tr>
										<tr>
											<td class="text-center">#TCK423</td>
											<td><span class="label label-success">PAID</span></td>
											<td>Joe Billy</td>
											<td>1</td>
											<td>Dog</td>
											<td>21/09/2014 - 22/09/2014</td>
											<td class="text-center">
												<div class="btn-group btn-group-xs">
		                                            <a class="btn btn-default" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
		                                            <a class="btn btn-danger" title="" data-toggle="tooltip" href="javascript:void(0)" data-original-title="Delete"><i class="fa fa-times"></i></a>
		                                        </div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="text-center">
								<ul class="pagination">
									<li class="disabled"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
									<li class="active"><a href="javascript:void(0)">1</a></li>
									<li><a href="javascript:void(0)">2</a></li>
									<li><a href="javascript:void(0)">3</a></li>
									<li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- END Tickets List -->
				</div>
				<!-- END Tabs Content -->
			</div>
			<!-- END Tickets Block -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>