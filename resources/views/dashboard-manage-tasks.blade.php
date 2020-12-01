@extends('layout.app')
@section('content')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Manage Tasks</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Tasks</li>
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
							<h3><i class="icon-material-outline-assignment"></i> My Tasks</h3>
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
                            @foreach($employer_tasks as $employer_task)
								<li>
									<!-- Job Listing -->
									<div class="job-listing width-adjustment">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="/task={{$employer_task->id}}">{{$employer_task->name}}</a></h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-access-time"></i> Announced at {{$employer_task->created_at->format('d/m')}}</li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Task Details -->
									<ul class="dashboard-task-info">
										<li><strong>{{$employer_task->task_bids->count()}}</strong><span>Bids</span></li>
										<li><strong>${{number_format($employer_task->task_bids->avg('bid'))}}</strong><span>Avg. Bid</span></li>
										<li><strong>${{number_format($employer_task->min_budget)}} - ${{number_format($employer_task->max_budget)}}</strong><span>Fixed Price</span></li>
									</ul>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="/manage-bidders/{{$employer_task->id}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Bidders <span class="button-info">{{$employer_task->task_bids->count()}}</span></a>
                                        <a href="#small-dialog" class="popup-with-zoom-anim button gray ripple-effect icon" title="Edit Task" data-tippy-placement="top"  onclick='changeModel("<?php echo $employer_task->id ?>")'><i class="icon-feather-edit"></i></a>

                                        <a href="/delete-task/{{$employer_task->id}}" class="button red ripple-effect ico" title="Cancel Bid" data-tippy-placement="top" > <i class="icon-feather-trash-2"></i></a>

									</div>
								</li>
                            @endforeach
							</ul>
						</div>
					</div>
				</div>

			</div>
            <div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">



            </div>



		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->


<!-- Scripts
================================================== -->

<script src="js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
// $('#snackbar-user-status label').click(function() {
// 	Snackbar.show({
// 		text: 'Your status has been changed!',
// 		pos: 'bottom-center',
// 		showAction: false,
// 		actionText: "Dismiss",
// 		duration: 3000,
// 		textColor: '#fff',
// 		backgroundColor: '#383838'
// 	});
// });

function changeModel(task_id)
{
    axios.get("/task-get-form/"+ task_id).then(function (res) {
        console.log(res.data);
        document.getElementById("small-dialog").innerHTML = res.data;
    });


}
</script>
@endsection
