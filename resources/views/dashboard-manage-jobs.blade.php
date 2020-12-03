@extends('layout.app')
@section('content')
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard Container -->


	<!-- Dashboard Sidebar
	================================================== -->

	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Manage Jobs</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Jobs</li>
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
							<h3><i class="icon-material-outline-business-center"></i> My Job Listings</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
                                @foreach($employer_jobs as $employer_job)
								<li>
									<!-- Job Listing -->
									<div class="job-listing">

										<!-- Job Listing Details -->
										<div class="job-listing-details">

											<!-- Logo -->
<!-- 											<a href="#" class="job-listing-company-logo">
												<img src="images/company-logo-05.png" alt="">
											</a> -->

											<!-- Details -->
											<div class="job-listing-description">
												<h3 class="job-listing-title"><a href="/job={{$employer_job->id}}">{{$employer_job->title}}</a> </h3>

												<!-- Job Listing Footer -->
												<div class="job-listing-footer">
													<ul>
														<li><i class="icon-material-outline-date-range"></i> Posted on {{$employer_job->created_at->format('d/m,y')}}</li>
													</ul>
												</div>
											</div>
										</div>
									</div>

									<!-- Buttons -->
									<div class="buttons-to-right always-visible">
										<a href="/manage-candidates/{{$employer_job->id}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">0</span></a>

                                        <a href="#small-dialog" class="popup-with-zoom-anim button gray ripple-effect icon" title="Edit Job" data-tippy-placement="top"  onclick='changeModel("<?php echo $employer_job->id ?>")'><i class="icon-feather-edit"></i></a>
                                        <a href="/delete-job/{{$employer_job->id}}" class="button red ripple-effect ico" title="Cancel Job" data-tippy-placement="top" > <i class="icon-feather-trash-2"></i></a>
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


<!-- Dashboard Container / End -->


<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="js/custom.js"></script>

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

function changeModel(job_id)
{
    axios.get("/job-get-form/"+ job_id).then(function (res) {
        console.log(res.data);
        document.getElementById("small-dialog").innerHTML = res.data;
    });


}
</script>
@endsection
