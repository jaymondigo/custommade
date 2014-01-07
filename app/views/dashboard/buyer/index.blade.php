@extends('dashboard.templates.index')

@section('content')
<!-- BEGIN CONTAINER -->
<div class="page-container row">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar" id="main-menu">
		<!-- BEGIN MINI-PROFILE -->
		<div class="user-info-wrapper">
			<div class="profile-wrapper">
				<img src="public/assets/img/profiles/avatar.jpg"  alt="" data-src="public/assets/img/profiles/avatar.jpg" data-src-retina="public/assets/img/profiles/avatar2x.jpg" width="69" height="69" />
			</div>
			<div class="user-info">
				<div class="greeting">Welcome</div>
				<div class="username">
					John
					<span class="semi-bold">Smith</span>
				</div>
				<div class="status">
					Status
					<a href="#">
						<div class="status-icon green"></div>
						Online
					</a>
				</div>
			</div>
		</div>
		<!-- END MINI-PROFILE -->

		<!-- BEGIN MINI-WIGETS -->

		<!-- END MINI-WIGETS -->

		<!-- BEGIN SIDEBAR MENU -->
		<p class="menu-title">
			BROWSE
			<span class="pull-right">
				<a href="javascript:;"> <i class="icon-refresh"></i>
				</a>
			</span>
		</p>
		<ul>
			<li class="start active ">
				<a href="index-2.html"> <i class="icon-custom-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					<span class="badge badge-important pull-right">5</span>
				</a>
			</li>

			<li class="">
				<a href="email.html">
					<i class="icon-envelope"></i>
					<span class="title">Email</span>
					<span class=" badge badge-disable pull-right ">203</span>
				</a>
			</li>
			<li class="">
				<a href="../frontend/index.html">
					<i class="icon-flag"></i>
					<span class="title">Frontend</span>
				</a>
			</li>
			<li class="">
				<a href="javascript:;">
					<i class="icon-custom-ui"></i>
					<span class="title">UI Elements</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li >
						<a href="typography.html">Typography</a>
					</li>
					<li >
						<a href="messages_notifications.html">Messages & Notifications</a>
					</li>
					<li >
						<a href="icons.html">Icons</a>
					</li>
					<li >
						<a href="buttons.html">Buttons</a>
					</li>
					<li >
						<a href="tabs_accordian.html">Tabs & Accordions</a>
					</li>
					<li >
						<a href="sliders.html">Sliders</a>
					</li>
					<li >
						<a href="group_list.html">Group list</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:;">
					<i class="icon-custom-form"></i>
					<span class="title">Forms</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li >
						<a href="form_elements.html">Form Elements</a>
					</li>
					<li >
						<a href="form_validations.html">Form Validations</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:;">
					<i class="icon-custom-portlets"></i>
					<span class="title">Grids</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li >
						<a href="grids_simple.html">Simple Grids</a>
					</li>
					<li >
						<a href="grids_draggable.html">Draggable Grids</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:;">
					<i class="icon-custom-thumb"></i>
					<span class="title">Tables</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li >
						<a href="tables.html">Basic Tables</a>
					</li>
					<li >
						<a href="datatables.html">Data Tables</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="javascript:;">
					<i class="icon-custom-map"></i>
					<span class="title">Maps</span>
					<span class="arrow "></span>
				</a>
				<ul class="sub-menu">
					<li >
						<a href="google_map.html">Google Maps</a>
					</li>
					<li >
						<a href="vector_map.html">Vector Maps</a>
					</li>
				</ul>
			</li>
			<li class="">
				<a href="charts.html">
					<i class="icon-custom-chart"></i>
					<span class="title">Charts</span>
				</a>
			</li>

		</ul>

		<a href="#" class="scrollup">Scroll</a>
		<div class="clearfix"></div>
		<!-- END SIDEBAR MENU -->
	</div>
	<div class="footer-widget">
		<div class="progress transparent progress-small no-radius no-margin">
			<div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
		</div>
		<div class="pull-right">
			<div class="details-status">
				<span class="animate-number" data-value="86" data-animation-duration="560">86</span>
				%
			</div>
			<a href="lockscreen.html">
				<i class="icon-off"></i>
			</a>
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN PAGE CONTAINER-->
	<div class="page-content">
		<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
		<div id="portlet-config" class="modal hide">
			<div class="modal-header">
				<button data-dismiss="modal" class="close" type="button"></button>
				<h3>Widget Settings</h3>
			</div>
			<div class="modal-body">Widget settings form goes here</div>
		</div>
		<div class="clearfix"></div>
		<div class="content">
			<div class="page-title">
				<h3>Dashboard</h3>
			</div>

			<div id="container">
				<div class="row spacing-bottom 2col">
					<div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
						<div class="tiles blue added-margin">
							<div class="tiles-body">
								<div class="controller">
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
								<div class="tiles-title">TODAY’S SERVER LOAD</div>
								<div class="heading">
									<span class="animate-number" data-value="26.8" data-animation-duration="1200">0</span>
									%
								</div>
								<div class="progress transparent progress-small no-radius">
									<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
								</div>
								<div class="description">
									<i class="icon-custom-up"></i>
									<span class="text-white mini-description ">
										&nbsp; 4% higher
										<span class="blend">than last month</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
						<div class="tiles green added-margin">
							<div class="tiles-body">
								<div class="controller">
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
								<div class="tiles-title">TODAY’S VISITS</div>
								<div class="heading">
									<span class="animate-number" data-value="2545665" data-animation-duration="1000">0</span>
								</div>
								<div class="progress transparent progress-small no-radius">
									<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="79%" ></div>
								</div>
								<div class="description">
									<i class="icon-custom-up"></i>
									<span class="text-white mini-description ">
										&nbsp; 2% higher
										<span class="blend">than last month</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 spacing-bottom">
						<div class="tiles red added-margin">
							<div class="tiles-body">
								<div class="controller">
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
								<div class="tiles-title">TODAY’S SALES</div>
								<div class="heading">
									$
									<span class="animate-number" data-value="14500" data-animation-duration="1200">0</span>
								</div>
								<div class="progress transparent progress-white progress-small no-radius">
									<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%" ></div>
								</div>
								<div class="description">
									<i class="icon-custom-up"></i>
									<span class="text-white mini-description ">
										&nbsp; 5% higher
										<span class="blend">than last month</span>
									</span>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-3 col-sm-6">
						<div class="tiles purple added-margin">
							<div class="tiles-body">
								<div class="controller">
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>
								</div>
								<div class="tiles-title">TODAY’S FEEDBACKS</div>
								<div class="row-fluid">
									<div class="heading">
										<span class="animate-number" data-value="1600" data-animation-duration="700">0</span>
									</div>
									<div class="progress transparent progress-white progress-small no-radius">
										<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="12%"></div>
									</div>
								</div>
								<div class="description">
									<i class="icon-custom-up"></i>
									<span class="text-white mini-description ">
										&nbsp; 3% higher
										<span class="blend">than last month</span>
									</span>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 spacing-bottom">
						<div class="row tiles-container tiles white spacing-bottom">
							<div class="tile-more-content col-md-4 col-sm-4 no-padding">
								<div class="tiles green">
									<div class="tiles-body">
										<div class="heading">Statistical</div>
										<p>Status : live</p>
									</div>
									<div class="tile-footer">
										<div class="iconplaceholder">
											<i class="icon-map-marker"></i>
										</div>
										258 Countries, 4835 Cities
									</div>
								</div>
								<div class="tiles-body" >
									<ul class="progress-list" >
										<li>
											<div class="details-wrapper">
												<div class="name">Foreign Visits</div>
												<div class="description">Our Overseas visits</div>
											</div>
											<div class="details-status pull-right">
												<span class="animate-number" data-value="89" data-animation-duration="800">0</span>
												%
											</div>
											<div class="clearfix"></div>
											<div class="progress progress-small no-radius" >
												<div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="89%" ></div>
											</div>
										</li>
										<li>
											<div class="details-wrapper">
												<div class="name">Local Visits</div>
												<div class="description">Our Overseas visits</div>
											</div>
											<div class="details-status pull-right">
												<span class="animate-number" data-value="45" data-animation-duration="600">0</span>
												%
											</div>
											<div class="clearfix"></div>
											<div class="progress progress-small no-radius ">
												<div class="progress-bar progress-bar-warning animate-progress-bar" data-percentage="45%" ></div>
											</div>
										</li>
										<li>
											<div class="details-wrapper">
												<div class="name">Other Visits</div>
												<div class="description">Our Overseas visits</div>
											</div>
											<div class="details-status pull-right">
												<span class="animate-number" data-value="12" data-animation-duration="200">0</span>
												%
											</div>
											<div class="clearfix"></div>
											<div class="progress progress-small no-radius">
												<div class="progress-bar progress-bar-danger animate-progress-bar" data-percentage="12%" ></div>
											</div>
										</li>
									</ul>

								</div>
							</div>
							<div class="tiles white col-md-8 col-sm-8 no-padding">
								<div class="tiles-chart">
									<div class="controller">
										<a href="javascript:;" class="reload"></a>
										<a href="javascript:;" class="remove"></a>
									</div>
									<div class="tiles-body">
										<div class="tiles-title">GEO-LOCATIONS</div>
										<div class="heading">
											8,545,654
											<i class="icon-map-marker"></i>
										</div>
									</div>
									<div id="world-map" style="height:405px"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>

						<div class="row tiles-container spacing-bottom tiles grey">
							<div class="tiles white col-md-8 col-sm-8 no-padding">
								<div class="tiles-body">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="mini-chart-wrapper">
												<div class="chart-details-wrapper">
													<div class="chartname">New Orders</div>
													<div class="chart-value">17,555</div>
												</div>
												<div class="mini-chart">
													<div id="mini-chart-orders"></div>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="mini-chart-wrapper">
												<div class="chart-details-wrapper">
													<div class="chartname">My Balance</div>
													<div class="chart-value">$17,555</div>
												</div>
												<div class="mini-chart">
													<div id="mini-chart-other" ></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div id="ricksaw" ></div>

								<div class="clearfix"></div>
							</div>
							<div class="col-md-4 col-sm-4 no-padding">
								<div class="tiles grey ">
									<div class="tiles white no-margin">
										<div class="tiles-body">
											<div class="tiles-title blend">OVERALL VIEWS</div>
											<div class="heading">
												<span data-animation-duration="1000" data-value="432852" class="animate-number">0</span>
											</div>
											44% higher
											<span class="blend">than last month</span>
										</div>
									</div>
									<div id="legend"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8 col-sm-8">
								<div class="tiles white">
									<div class="tiles-body">
										<div class="controller">
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
										<div class="tiles-title">NOTIFICATIONS</div>
										<br>
										<div class="notification-messages info">
											<div class="user-profile">
												<img src="public/assets/img/profiles/c.jpg"  alt="" data-src="public/assets/img/profiles/c.jpg" data-src-retina="public/assets/img/profiles/c2x.jpg" width="35" height="35"></div>
											<div class="message-wrapper">
												<div class="heading">David Nester - Commented on your wall</div>
												<div class="description">Meeting postponed to tomorrow</div>
											</div>
											<div class="date pull-right">Just now</div>
										</div>
										<div class="notification-messages danger">
											<div class="iconholder">
												<i class="icon-warning-sign"></i>
											</div>
											<div class="message-wrapper">
												<div class="heading">Server load limited</div>
												<div class="description">Database server has reached its daily capicity</div>
											</div>
											<div class="date pull-right">Yesterday</div>
										</div>
										<div class="notification-messages success">
											<div class="user-profile">
												<img src="public/assets/img/profiles/h.jpg"  alt="" data-src="public/assets/img/profiles/h.jpg" data-src-retina="public/assets/img/profiles/h2x.jpg" width="35" height="35"></div>
											<div class="message-wrapper">
												<div class="heading">You have've got 150 messages</div>
												<div class="description">150 newly unread messages in your inbox</div>
											</div>
											<div class="date pull-right">Yesterday</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 no-padding">
								<div class="tiles red weather-widget ">
									<div class="tiles-body">
										<div class="controller">
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
										<div class="tiles-title">TODAY’S WEATHER</div>
										<div class="heading">
											<div class="pull-left">Tuesday</div>
											<div class="pull-right">55</div>
											<div class="clearfix"></div>
										</div>
										<div class="big-icon">
											<canvas id="partly-cloudy-day" width="120"  height="120" ></canvas>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="tile-footer">
										<div class="pull-left">
											<canvas id="wind" width="32" height="32"></canvas>
											<span class="text-white small-text-description">Windy</span>
										</div>
										<div class="pull-right">
											<canvas id="rain" width="32" height="32"></canvas>
											<span class="text-white small-text-description">Humidity</span>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="row spacing-bottom ">
							<div class="col-md-12">
								<div class="tiles white added-margin">
									<div class="tiles-body">
										<div class="controller">
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
										<div class="tiles-title">SERVER LOAD</div>
										<div class="heading text-black ">250 GB</div>
										<div class="progress  progress-small no-radius">
											<div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="25%" ></div>
										</div>
										<div class="description">
											<span class="mini-description">
												<span class="text-black">250GB</span>
												of
												<span class="text-black">1,024GB</span>
												used
											</span>
										</div>
									</div>
								</div>
								<div class="tiles white added-margin">
									<div id="chart"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-6 spacing-bottom">
								<div class="widget">
									<div class="widget-title dark">
										<div class="pull-left ">
											<button class="btn  btn-dark  btn-small" type="button">
												<i class="icon-plus"></i>
											</button>
										</div>
										Todo list
										<div class="controller">
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
									</div>
									<div class="widget-body">
										<div class="col-md-12">
											<input type="text" class="form-control dark" id="date"></div>
										<br>
										<div class="row-fluid">
											<div class="checkbox check-success 	">
												<input type="checkbox" value="1" id="chk_todo01" class="todo-list">
												<label for="chk_todo01">Send email to David, new signups</label>
											</div>
										</div>
										<div class="row-fluid">
											<div class="checkbox check-success 	">
												<input type="checkbox" checked="checked" value="1" id="chk_todo02" class="todo-list">
												<label for="chk_todo02" class="done">Call Jane!!</label>
											</div>
										</div>
										<div class="row-fluid">
											<div class="checkbox check-success 	">
												<input type="checkbox"  value="1" id="chk_todo03" class="todo-list">
												<label for="chk_todo03">Server upgrades ASAP</label>
											</div>
										</div>
										<div class="row-fluid">
											<div class="checkbox check-success 	">
												<input type="checkbox" value="1" id="chk_todo04" class="todo-list">
												<label for="chk_todo04">Hello, new task</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 white col-sm-6">
								<div class="tiles purple added-margin" style="max-height:345px">
									<div class="tiles-body">
										<div class="controller">
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
										<h3 class="text-white ">
											<br>
											<br>
											<br>
											<span class="semi-bold">Steve Jobs</span>
											Time Capsule` is 
									Finally Unearthed on
											<span class="semi-bold">Skyace News</span>
										</h3>
										<div class="blog-post-controls-wrapper">
											<div class="blog-post-control">
												<a class="text-white" href="#">
													<i class="icon-heart"></i>
													47k
												</a>
											</div>
											<div class="blog-post-control">
												<a class="text-white" href="#">
													<i class="icon-comment"></i>
													1584
												</a>
											</div>
										</div>

										<br></div>

								</div>
								<div class="tiles white added-margin">
									<div class="tiles-body">
										<div class="row">
											<div class="user-comment-wrapper col-mid-12">
												<div class="profile-wrapper">
													<img src="public/assets/img/profiles/d.jpg"  alt="" data-src="public/assets/img/profiles/d.jpg" data-src-retina="public/assets/img/profiles/d2x.jpg" width="35" height="35"></div>
												<div class="comment">
													<div class="user-name">
														David
														<span class="semi-bold">Cooper</span>
													</div>
													<div class="preview-wrapper">What's the progress on the new project?</div>
													<div class="more-details-wrapper">
														<div class="more-details">
															<i class="icon-time"></i>
															12 mins ago
														</div>
														<div class="more-details">
															<i class="icon-map-marker"></i>
															Near Florida
														</div>
													</div>
												</div>

												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- END PAGE -->
		</div>
	</div>
	 
	<!-- END CONTAINER -->
</div>
@stop

@section('scripts')
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="public/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->

<!-- BEGIN PAGE LEVEL JS -->
<script src="public/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="public/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="public/assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="public/assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="public/assets/plugins/jquery-morris-chart/js/morris.min.js"></script>
<script src="public/assets/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js"></script>
<script src="public/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-jvectormap/js/jquery-jvectormap-us-lcc-en.js" type="text/javascript"></script>
<script src="public/assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="public/assets/plugins/jquery-flot/jquery.flot.min.js"></script>
<script src="public/assets/plugins/jquery-flot/jquery.flot.animator.min.js"></script>
<script src="public/assets/plugins/skycons/skycons.js"></script>
<!-- END PAGE LEVEL PLUGINS   -->
<!-- PAGE JS -->
<script src="public/assets/js/dashboard.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="public/assets/js/core.js" type="text/javascript"></script>
<script src="public/assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
@stop