@extends('layout.app')
@section('content')


<!-- Titlebar
================================================== -->
<div class="single-page-header" data-background-image="images/employer.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><img src="{{$employer->logo}}" alt="employers-logo"></div>

                        <div class="header-details">
                            <h3>{{$employer->name}}  </h3>


                        </div>
					</div>
					<div class="right-side">
						<!-- Breadcrumbs -->
						<nav id="breadcrumbs" class="white">
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="/browse-employers">Browse Companies</a></li>
								<li>{{$employer->name}}</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">

		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<div class="single-page-section">
				<h3 class="margin-bottom-25">About Company</h3>
				<p>{{$employer->about}}</p>

			</div>

			<!-- Boxed List -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-business-center"></i> Open Positions</h3>
				</div>

				<div class="listings-container compact-list-layout">
                    @foreach($jobs as $job)
                        <!-- Job Listing -->
                        <a href="/job={{$job->id}}" class="job-listing">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">{{$job->title}}</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i {!! $job->category->icon !!}></i> {{$job->category->name}}</li>
                                            <li><i class="icon-material-outline-business-center"></i>{{$job->type}}</li>
                                            <li><i class="icon-material-outline-access-time"></i> {{$job->created_at->format('d/m')}}</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>


                        </a>
                    @endforeach

				</div>

			</div>
			<!-- Boxed List / End -->

			<!-- Boxed List -->
{{--			<div class="boxed-list margin-bottom-60">--}}
{{--				<div class="boxed-list-headline">--}}
{{--					<h3><i class="icon-material-outline-thumb-up"></i> Reviews</h3>--}}
{{--				</div>--}}
{{--				<ul class="boxed-list-ul">--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>Doing things the right way <span>Anonymous Employee</span></h4>--}}
{{--								<div class="item-details margin-top-10">--}}
{{--									<div class="star-rating" data-rating="5.0"></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> August 2018</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>Great company and especially ideal for the career-minded individual. The company is large enough to offer a variety of jobs in all kinds of interesting locations. Even if you never change roles, your job changes and evolves as the company grows, keeping things fresh.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--					<li>--}}
{{--						<div class="boxed-list-item">--}}
{{--							<!-- Content -->--}}
{{--							<div class="item-content">--}}
{{--								<h4>Outstanding Work Environment <span>Anonymous Employee</span></h4>--}}
{{--								<div class="item-details margin-top-10">--}}
{{--									<div class="star-rating" data-rating="5.0"></div>--}}
{{--									<div class="detail-item"><i class="icon-material-outline-date-range"></i> May 2018</div>--}}
{{--								</div>--}}
{{--								<div class="item-description">--}}
{{--									<p>They do business with integrity and rational thinking. Overall, it's an excellent place to work, with products that are winning in the marketplace.</p>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</li>--}}
{{--				</ul>--}}

{{--				<div class="centered-button margin-top-35">--}}
{{--					<a href="#small-dialog" class="popup-with-zoom-anim button button-sliding-icon">Leave a Review <i class="icon-material-outline-arrow-right-alt"></i></a>--}}
{{--				</div>--}}

{{--			</div>--}}
			<!-- Boxed List / End -->

		</div>


		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<!-- Location -->
				<div class="sidebar-widget">
					<h3>Location</h3>
                    <p>{{$employer->location}}  </p>
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

{{--				<!-- Sidebar Widget -->--}}
{{--				<div class="sidebar-widget">--}}
{{--					<h3>Bookmark or Share</h3>--}}

{{--					<!-- Bookmark Button -->--}}
{{--					<button class="bookmark-button margin-bottom-25">--}}
{{--						<span class="bookmark-icon"></span>--}}
{{--						<span class="bookmark-text">Bookmark</span>--}}
{{--						<span class="bookmarked-text">Bookmarked</span>--}}
{{--					</button>--}}

{{--					<!-- Copy URL -->--}}
{{--					<div class="copy-url">--}}
{{--						<input id="copy-url" type="text" value="" class="with-border">--}}
{{--						<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" title="Copy to Clipboard" data-tippy-placement="top"><i class="icon-material-outline-file-copy"></i></button>--}}
{{--					</div>--}}

{{--					<!-- Share Buttons -->--}}
{{--					<div class="share-buttons margin-top-25">--}}
{{--						<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>--}}
{{--						<div class="share-buttons-content">--}}
{{--							<span>Interesting? <strong>Share It!</strong></span>--}}
{{--							<ul class="share-buttons-icons">--}}
{{--								<li><a href="#" data-button-color="#3b5998" title="Share on Facebook" data-tippy-placement="top"><i class="icon-brand-facebook-f"></i></a></li>--}}
{{--								<li><a href="#" data-button-color="#1da1f2" title="Share on Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>--}}
{{--								<li><a href="#" data-button-color="#dd4b39" title="Share on Google Plus" data-tippy-placement="top"><i class="icon-brand-google-plus-g"></i></a></li>--}}
{{--								<li><a href="#" data-button-color="#0077b5" title="Share on LinkedIn" data-tippy-placement="top"><i class="icon-brand-linkedin-in"></i></a></li>--}}
{{--							</ul>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}

			</div>
		</div>

	</div>
</div>


<!-- Spacer -->
<div class="margin-top-15"></div>
<!-- Spacer / End-->
@endsection
