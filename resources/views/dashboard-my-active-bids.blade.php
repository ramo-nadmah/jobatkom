@extends('layout.app')
@section('content')
    <div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
{{--	<div class="dashboard-sidebar">--}}
{{--		<div class="dashboard-sidebar-inner" data-simplebar>--}}
{{--			<div class="dashboard-nav-container">--}}

{{--				<!-- Responsive Navigation Trigger -->--}}
{{--				<a href="#" class="dashboard-responsive-nav-trigger">--}}
{{--					<span class="hamburger hamburger--collapse" >--}}
{{--						<span class="hamburger-box">--}}
{{--							<span class="hamburger-inner"></span>--}}
{{--						</span>--}}
{{--					</span>--}}
{{--					<span class="trigger-title">Dashboard Navigation</span>--}}
{{--				</a>--}}

{{--				<!-- Navigation -->--}}
{{--				<div class="dashboard-nav">--}}
{{--					<div class="dashboard-nav-inner">--}}

{{--						<ul data-submenu-title="Start">--}}
{{--							<li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>--}}
{{--							<li><a href="dashboard-messages.html"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>--}}
{{--							<li><a href="dashboard-bookmarks.html"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>--}}
{{--							<li><a href="dashboard-reviews.html"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>--}}
{{--						</ul>--}}

{{--						<ul data-submenu-title="Organize and Manage">--}}
{{--							<li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>--}}
{{--								<ul>--}}
{{--									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>--}}
{{--									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>--}}
{{--									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--							<li class="active-submenu"><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>--}}
{{--								<ul>--}}
{{--									<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>--}}
{{--									<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>--}}
{{--									<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>--}}
{{--									<li><a href="dashboard-post-a-task.html">Post a Task</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--						</ul>--}}

{{--						<ul data-submenu-title="Account">--}}
{{--							<li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>--}}
{{--							<li><a href="index-logged-out.html"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>--}}
{{--						</ul>--}}

{{--					</div>--}}
{{--				</div>--}}
{{--				<!-- Navigation / End -->--}}

{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>My Active Bids</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>My Active Bids</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-gavel"></i> Bids List</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @foreach($task_bids as $task_bid)
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="/task={{$task_bid->task_id}}">{{$task_bid->task->name}}</a></h3>
											</div>
										</div>
									</div>

									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>${{$task_bid->bid}}</strong><span>Hourly Rate/Fixed price</span></li>
										<li><strong>{{$task_bid->time}} {{$task_bid->time_quantity}}</strong><span>Delivery Time</span></li>
									</ul>
                                    <!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="#small-dialog" class="popup-with-zoom-anim button dark ripple-effect icon" title="Edit Bid" data-tippy-placement="top"  onclick='changeModel("<?php echo $task_bid->id ?>")'><i class="icon-feather-edit"></i></a>
										<a href="/delete-task/{{$task_bid->id}}" class="button red ripple-effect ico" title="Cancel Bid" data-tippy-placement="top" > <i class="icon-feather-trash-2"></i></a>
									</div>
								</li>
                                @endforeach

							</ul>
						</div>
					</div>
				</div>
            </div>
			<!-- Row / End -->
        </div>
	</div>
	<!-- Dashboard Content / End -->
    <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">



    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="/js/custom.js"></script>

    <script >
        function dosth()
        {
            console.log("ffffffffffffff");
        }

        function changeModel(bid_id)
        {
            axios.get("/get_form/"+ bid_id).then(function (res) {
                console.log(res.data);
                document.getElementById("small-dialog").innerHTML = res.data;
            });


        }


    </script>

    <!-- Dashboard Container / End -->
@endsection





