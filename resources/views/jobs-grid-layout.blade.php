@extends('layout.app')
@section('content')
<div class="clearfix"></div>
<!-- Header Container / End -->

<div id="titlebar" class="gradient">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Browse Jobs</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs" class="dark">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Glance</a></li>
                        <li>Browse Jobs</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>


<!-- Spacer -->
<div class="margin-top-90"></div>
<!-- Spacer / End-->

<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4">
			<div class="sidebar-container">

                <form action="/search-job" method="get">
                @csrf

                    <!-- Keyword -->
                    <div class="sidebar-widget">
                        <h3>Choose a keyword</h3>
                        <div class="keywords-container">
                            <div class="keyword-input-container">
                                <input type="text" name="keyword" class="keyword-input" placeholder="e.g. job title"/>
                            </div>
                            <div class="keywords-list"><!-- keywords go here --></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="sidebar-widget">
                        <h3>Category</h3>
                        <select name="category" class="selectpicker default"  title="All Categories" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Job Types -->
{{--                    <div class="sidebar-widget">--}}
{{--                        <h3>Job Type</h3>--}}

{{--                        <div class="switches-list">--}}
{{--                            <div class="switch-container">--}}
{{--                                <label class="switch"><input type="checkbox" name="type[]" value="freelance"><span class="switch-button"></span> Freelance</label>--}}
{{--                            </div>--}}

{{--                            <div class="switch-container">--}}
{{--                                <label class="switch"><input type="checkbox" name="type[]" value="fulltime"><span class="switch-button"></span> Full Time</label>--}}
{{--                            </div>--}}

{{--                            <div class="switch-container">--}}
{{--                                <label class="switch"><input type="checkbox" name="type[]" value="parttime"><span class="switch-button"></span> Part Time</label>--}}
{{--                            </div>--}}

{{--                            <div class="switch-container">--}}
{{--                                <label class="switch"><input type="checkbox" name="type[]" value="internship"><span class="switch-button"></span> Internship</label>--}}
{{--                            </div>--}}
{{--                            <div class="switch-container">--}}
{{--                                <label class="switch"><input type="checkbox" name="type[]" value="temporary"><span class="switch-button"></span> Temporary</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >Search <i class="icon-material-outline-arrow-right-alt"></i></button>

                </form>

			</div>
		</div>
		<div class="col-xl-9 col-lg-8 content-left-offset">

			<h3 class="page-title">Search Results</h3>



			<div class="listings-container grid-layout margin-top-35">

				@foreach($jobs as $job)
				<!-- Job Listing -->
				<a href="/job={{$job->id}}" class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">
							<img src="{{$job->employer->logo}}" alt="">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company">{{$job->employer->name}}</h4>
							<h3 class="job-listing-title">{{$job->title}}</h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<ul>
                            @php

                                $datework = new \Carbon\Carbon($job->updated_at);
                                $now = \Carbon\Carbon::now();
                                $diff = $datework->diffInDays($now);
                            @endphp
							<li><i class="icon-material-outline-business-center"></i> {{$job->type}}</li>
							<li><i class="icon-material-outline-account-balance-wallet"></i> ${{number_format($job->salary_min_value)}}-${{number_format($job->salary_max_value)}}</li>
							<li><i class="icon-material-outline-access-time"></i> {{$diff}} days ago</li>
						</ul>
					</div>
				</a>
                @endforeach


			</div>

			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-30 margin-bottom-60 ">
						<nav class="pagination justify-content-center">

                            <div>
                                {{ $jobs->appends(request()->input())->links() }}
                            </div>
{{--							<ul>--}}
{{--								<li class="pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-left"></i></a></li>--}}
{{--								<li><a href="#">1</a></li>--}}
{{--								<li><a href="#" class="current-page">2</a></li>--}}
{{--								<li><a href="#">3</a></li>--}}
{{--								<li><a href="#">4</a></li>--}}
{{--								<li class="pagination-arrow"><a href="#"><i class="icon-material-outline-keyboard-arrow-right"></i></a></li>--}}
{{--							</ul>--}}
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>
	</div>
</div>


<!-- Footer
================================================== -->

<script src="js/custom.js"></script>
@endsection
