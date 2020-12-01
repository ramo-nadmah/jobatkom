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
				<h3>Manage Bidders</h3>
				<span class="margin-top-7">Bids for <a href="/task={{$task[0]->id}}">{{$task[0]->name}}</a></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Manage Bidders</li>
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
							<h3><i class="icon-material-outline-supervisor-account"></i> {{$task_bids->count()}} Bidders</h3>

						</div>

						<div class="content">
							<ul class="dashboard-box-list">
								@foreach($task_bids as $task_bid)
								<li>
									<!-- Overview -->
									<div class="freelancer-overview manage-candidates">
										<div class="freelancer-overview-inner">

											<!-- Avatar -->
											<div class="freelancer-avatar">
												<a href="/freelancer={{$task_bid->freelancer_id}}"><img src="{{$task_bid->freelancer->logo}}" alt="freelancers pic"></a>
											</div>

											<!-- Name -->
											<div class="freelancer-name">
												<h4><a href="/view-freelancer={{$task_bid->freelancer_id}}">{{$task_bid->freelancer->first_name}} {{$task_bid->freelancer->last_name}} </a></h4>

												<!-- Details -->
												<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{$task_bid->freelancer->user->email}}</a></span>


												<!-- Rating -->


												<!-- Bid Details -->
												<ul class="dashboard-task-info bid-info">
													<li><strong>${{number_format($task_bid->bid)}}</strong><span>Fixed Price/Hourly Rate</span></li>
													<li><strong>{{$task_bid->time_quantity}} {{$task_bid->time}}</strong><span>Delivery Time</span></li>
												</ul>

												<!-- Buttons -->
												<div class="buttons-to-right always-visible margin-top-25 margin-bottom-0">
                                                    @if($task_bid->status == null)
                                                        <div class="row flex-row justify-content align-items-center">
                                                            <span class="dashboard-status-button yellow mt-2">Pending Approval</span>
                                                            <a href="/accept-task-bid/{{$task_bid->id}}" class="button ripple-effect"><i class="icon-material-outline-thumb-up"></i> Approve task bid</a>
                                                            <a href="/reject-task-bid/{{$task_bid->id}}" class="button gray  icon" title="Reject task bid" data-tippy-placement="top"><i class="icon-feather-trash-2"></i>Reject task bid</a>
                                                        </div>
                                                    @elseif($task_bid->status =="approved")
                                                        <div class="row flex-row justify-content align-items-center">

                                                            <span class="dashboard-status-button green mt-2">Approved</span>
                                                            <a href="/reject-task-bid/{{$task_bid->id}}" class="button gray " title="Reject task bid" data-tippy-placement="top"><i class="icon-feather-trash-2"></i>Reject task bid</a>
                                                        </div>
                                                    @elseif($task_bid->status =="rejected")
                                                        <div class="row flex-row justify-content align-items-center">

                                                            <span class="dashboard-status-button red mt-2">Rejected</span>
                                                            <a href="/accept-task-bid/{{$task_bid->id}}" class="button ripple-effect"><i class="icon-material-outline-thumb-up"></i> Approve task bid</a>
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

<!-- Wrapper / End -->

nd Direct Message Popup / End -->


<!-- Scripts
================================================== -->

<script src="js/custom.js"></script>

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->

@endsection
