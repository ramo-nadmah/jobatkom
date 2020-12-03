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
				<h3>Manage Candidates</h3>
				<span class="margin-top-7">Job Applications for <a href="/job={{$job[0]->id}}">{{$job[0]->title}}</a></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Candidates</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$job_bids->count()}} Candidates</h3>
						</div>

						<div class="content">
							<ul class="dashboard-box-list">
                                @foreach($job_bids as $job_bid)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">

												<a href="/view-freelancer={{$job_bid->freelancer->id}}"><img src="{{$job_bid->freelancer->logo}}" alt="freelancer's pic"></a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="/view-freelancer={{$job_bid->freelancer->id}}">{{$job_bid->freelancer->first_name}} {{$job_bid->freelancer->last_name}} </a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><i class="icon-feather-mail"></i> {{$job_bid->freelancer->user->email}}</span>


												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">
													@if($job_bid->status == null)
                                                        <div class="row flex-row justify-content align-items-center">
                                                            <span class="dashboard-status-button yellow mt-2">Pending Approval</span>
                                                            <a href="/accept-job-request/{{$job_bid->id}}" class="button ripple-effect"><i class="icon-material-outline-thumb-up"></i> Approve job request</a>
                                                            <a href="/reject-job-request/{{$job_bid->id}}" class="button gray  icon" title="Reject job request" data-tippy-placement="top"><i class="icon-feather-trash-2"></i>Reject job request</a>
                                                        </div>
                                                    @elseif($job_bid->status =="approved")
                                                        <div class="row flex-row justify-content align-items-center">

                                                        <span class="dashboard-status-button green mt-2">Approved</span>
                                                        <a href="/reject-job-request/{{$job_bid->id}}" class="button gray " title="Reject job request" data-tippy-placement="top"><i class="icon-feather-trash-2"></i>Reject job request</a>
                                                        </div>
                                                    @elseif($job_bid->status =="rejected")
                                                        <div class="row flex-row justify-content align-items-center">

                                                        <span class="dashboard-status-button red mt-2">Rejected</span>
                                                        <a href="/accept-job-request/{{$job_bid->id}}" class="button ripple-effect"><i class="icon-material-outline-thumb-up"></i> Approve job request</a>
                                                        </div>

                                                    @endif
                                                </div>
											</div>
										</div>
									</div>
								</li>
                                @endforeach


							</ul>
						</div>
					</div>
				</div>

			</div>
			<!-- Row / End -->

			<!-- Footer -->

			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="js/custom.js"></script>

@endsection
