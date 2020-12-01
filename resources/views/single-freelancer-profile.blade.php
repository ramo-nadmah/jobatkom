@extends('layout.app')
@section('content')

<!-- Page Content
================================================== -->
<div class="container">


    <!-- Titlebar
    ================================================== -->
    <div class="single-page-header freelancer-header" data-background-image="/images/freelance.png">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image freelancer-avatar"><img src="{{$freelancer->logo}}" alt="freelancers pic"></div>
                            <div class="header-details">
                                <h3>{{$freelancer->first_name}}  {{$freelancer->last_name}} <span>{{$freelancer->tagline}}</span></h3>
                                <h3>Nationality <span>{{$freelancer->nationality}}</span></h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<!-- Page Content -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">About Me</h3>
				<p style="overflow-wrap: break-word">{{$freelancer->description}}</p>

			</div>

{{--			<!-- Boxed List -->--}}
{{--			<div class="boxed-list margin-bottom-60">--}}
{{--				<div class="boxed-list-headline">--}}
{{--					<h3><i class="icon-material-outline-thumb-up"></i> Work History and Feedback</h3>--}}
{{--				</div>--}}
{{--				<ul class="boxed-list-ul">--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>Web, Database and API Developer <span>Rated as Freelancer</span></h4>--}}
{{--								<div class="item-details margin-top-10">--}}
{{--									<div class="star-rating" data-rating="5.0"></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> August 2018</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>Excellent programmer - fully carried out my project in a very professional manner. </p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>WordPress Theme Installation <span>Rated as Freelancer</span></h4>--}}
{{--								<div class="item-details margin-top-10">--}}
{{--									<div class="star-rating" data-rating="5.0"></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> June 2018</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>Fix Python Selenium Code <span>Rated as Employer</span></h4>--}}
{{--								<div class="item-details margin-top-10">--}}
{{--									<div class="star-rating" data-rating="5.0"></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>I was extremely impressed with the quality of work AND how quickly he got it done. He then offered to help with another side part of the project that we didn't even think about originally.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>PHP Core Website Fixes <span>Rated as Freelancer</span></h4>--}}
{{--								<div class="item-details margin-top-10">--}}
{{--									<div class="star-rating" data-rating="5.0"></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>Awesome work, definitely will rehire. Poject was completed not only with the requirements, but on time, within our small budget.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--				</ul>--}}

{{--				<!-- Pagination -->--}}
{{--				<div class="clearfix"></div>--}}
{{--				<div class="pagination-container margin-top-40 margin-bottom-10">--}}
{{--					<nav class="pagination">--}}
{{--						<ul>--}}
{{--							<li><a href="#" class="ripple-effect current-page">1</a></li>--}}
{{--							<li><a href="#" class="ripple-effect">2</a></li>--}}
{{--							<li class="pagination-arrow"><a href="#" class="ripple-effect"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>--}}
{{--						</ul>--}}
{{--					</nav>--}}
{{--				</div>--}}
{{--				<div class="clearfix"></div>--}}
{{--				<!-- Pagination / End -->--}}

{{--			</div>--}}
{{--			<!-- Boxed List / End -->--}}

{{--			<!-- Boxed List -->--}}
{{--			<div class="boxed-list margin-bottom-60">--}}
{{--				<div class="boxed-list-headline">--}}
{{--					<h3><i class="icon-material-outline-business"></i> Employment History</h3>--}}
{{--				</div>--}}
{{--				<ul class="boxed-list-ul">--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Avatar -->--}}
{{--							<div class="item-image">--}}
{{--								<img src="images/browse-companies-03.png" alt="">--}}
{{--							</div>--}}

{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>Development Team Leader</h4>--}}
{{--								<div class="item-details margin-top-7">--}}
{{--									<div class="detail-item"><a href="#"><i class="icon-material-outline-business"></i> Acodia</a></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018 - Present</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>Focus the team on the tasks at hand or the internal and external customer requirements.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Avatar -->--}}
{{--							<div class="item-image">--}}
{{--								<img src="images/browse-companies-04.png" alt="">--}}
{{--							</div>--}}

{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4><a href="#">Lead UX/UI Designer</a></h4>--}}
{{--								<div class="item-details margin-top-7">--}}
{{--									<div class="detail-item"><a href="#"><i class="icon-material-outline-business"></i> Acorta</a></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> April 2014 - May 2018</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>I designed and implemented 10+ custom web-based CRMs, workflow systems, payment solutions and mobile apps.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--				</ul>--}}
{{--			</div>--}}
{{--			<!-- Boxed List / End -->--}}

		</div>


		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<!-- Profile Overview -->
				<div class="profile-overview">
					<div class="overview-item"><strong>${{$freelancer->minimal_hourly_rate}}</strong><span>Hourly Rate</span></div>
					<div class="overview-item"><strong>{{$freelancer->tasks_done}}</strong><span>Jobs Done</span></div>

				</div>


				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Social Profiles</h3>
					<div class="freelancer-socials margin-top-25">
						<ul>
							<li><a href="#" title="Dribbble" data-tippy-placement="top"><i class="icon-brand-dribbble"></i></a></li>
							<li><a href="#" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>
							<li><a href="#" title="Behance" data-tippy-placement="top"><i class="icon-brand-behance"></i></a></li>
							<li><a href="#" title="GitHub" data-tippy-placement="top"><i class="icon-brand-github"></i></a></li>

						</ul>
					</div>
				</div>

				<!-- Widget -->
				<div class="sidebar-widget">
					<h3>Skills</h3>
					<div class="task-tags">
                        @foreach($skills as $skill)
						<span>{{$skill}}</span>
						@endforeach

					</div>
				</div>



			</div>
		</div>

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->


@endsection
