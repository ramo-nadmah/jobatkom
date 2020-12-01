@extends('layout.app')
@section('content')
<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner " data-background-image="images/saniee.jpg">
	<div class="container">

		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Hire experts or be hired for any job, any time.</strong>
						<br>
						<span>Thousands of small businesses use <strong class="color">Jobatkom</strong> to turn their ideas into reality.</span>
					</h3>
				</div>
			</div>
		</div>

		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
                <form action="search-job" method="post">
                    @csrf
				<div class="intro-banner-search-form margin-top-95">


                        <!-- Search Field -->
                        <div class="intro-search-field">
                            <label for ="intro-keywords" class="field-title ripple-effect">What job you want?</label>
                            <input name="keyword" id="intro-keywords" type="text" placeholder="Job Title or Keywords">
                        </div>


				</div>
                    <!-- Button -->
                    <button class="button ripple-effect" type="submit">Search</button>

                </form>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter">{{number_format($jobs_posted)}}</strong>
						<span>Jobs Posted</span>
					</li>
					<li>
						<strong class="counter">{{number_format($tasks_posted)}}</strong>
						<span>Tasks Posted</span>
					</li>
					<li>
						<strong class="counter">{{number_format($freelancers)}}</strong>
						<span>Freelancers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<!-- Category Boxes -->
<div class="section margin-top-65">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<div class="section-headline centered margin-bottom-15">
					<h3>Popular Job Categories</h3>
				</div>

				<!-- Category Boxes Container -->
				<div class="categories-container">
                    @foreach($categories as $category)
                        <!-- Category Box -->

                        <a href="/search-job?category={{$category->id}}" class="category-box">
                            <div class="category-box-icon">
                                <i class="{{$category->icon}}"></i>
                            </div>
                            <div class="category-box-counter">{{App\Job::where('category_id',$category->id)->count()}}</div>
                            <div class="category-box-content">
                                <h3>{{$category->name}}</h3>
                                <p>{{$category->description}}</p>
                            </div>
                        </a>
                    @endforeach


				</div>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->


<!-- Features Jobs -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Latest Jobs</h3>
					<a href="/browse-jobs" class="headline-link">Browse All Jobs</a>
				</div>

				<!-- Jobs Container -->
				<div class="listings-container compact-list-layout margin-top-35">
                    @foreach($latest_jobs as $latest_job)
                        <!-- Job Listing -->
                        <a href="/job={{$latest_job->id}}" class="job-listing with-apply-button">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">

                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    <img src="{{$latest_job->employer->logo}}" alt="employer logo">
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h3 class="job-listing-title">{{$latest_job->title}}</h3>

                                    <!-- Job Listing Footer -->
                                    <div class="job-listing-footer">
                                        <ul>
                                            <li><i class="icon-material-outline-business"></i>{{$latest_job->employer->name}}</li>
                                            <li><i class="icon-material-outline-location-on"></i> {{$latest_job->employer->location}}</li>
                                            <li><i class="icon-material-outline-business-center"></i> {{$latest_job->type}}</li>
                                            @php

                                            $datework = new \Carbon\Carbon($latest_job->updated_at);
                                            $now = \Carbon\Carbon::now();
                                            $diff = $datework->diffInDays($now);
                                            @endphp
                                            <li><i class="icon-material-outline-access-time"></i> {{$diff = $datework->diffInDays($now)}} ago</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Apply Button -->
                            </div>
                        </a>
                    @endforeach



				</div>
				<!-- Jobs Container / End -->

			</div>
		</div>
	</div>
</div>
<!-- Featured Jobs / End -->


<!-- Highest Rated Freelancers -->
<div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-25">
					<h3>Latest Freelancers</h3>
					<a href="/browse-freelancers" class="headline-link">Browse All Freelancers</a>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="default-slick-carousel freelancers-container freelancers-grid-layout">

				    @foreach($latest_freelancers as $latest_freelancer)
                        <!--Freelancer -->
                        <div class="freelancer">

                            <!-- Overview -->
                            <div class="freelancer-overview">
                                <div class="freelancer-overview-inner">


                                    <!-- Avatar -->
                                    <div class="freelancer-avatar">
                                        <a href="/view-freelancer={{$latest_freelancer->id}}"><img src="{{$latest_freelancer->logo}}" alt="freelancer logo"></a>
                                    </div>

                                    <!-- Name -->
                                    <div class="freelancer-name">
                                <h4><a href="/view-freelancer={{$latest_freelancer->id}}">{{$latest_freelancer->first_name}} {{$latest_freelancer->last_name}} </a></h4>
                                        <span>{{$latest_freelancer->tag_line}}</span>
                                    </div>


                                </div>
                            </div>

                            <!-- Details -->
                            <div class="freelancer-details">
                                <div class="freelancer-details-list">
                                    <ul>
                                        <li>MIN hourly Rate <strong>${{number_format($latest_freelancer->minimal_hourly_rate)}} / hr</strong></li>
                                        <li>Tasks done <strong>{{$latest_freelancer->tasks_done}}</strong></li>
                                    </ul>
                                </div>
                        <a href="/view-freelancer={{$latest_freelancer->id}}" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
                            </div>
                        </div>
                        <!-- Freelancer / End -->
                    @endforeach



				</div>
			</div>

		</div>
	</div>
</div>
<!-- Highest Rated Freelancers / End-->



<!-- Footer
================================================== -->


<!-- Scripts
================================================== -->

<script src="js/custom.js"></script>

@endsection
