@extends('layout.app')
@section('content')

    <div class="clearfix"></div>
    <!-- Header Container / End -->



    <!-- Titlebar
    ================================================== -->
    <div class="single-page-header" data-background-image="images/single-task.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image"><a href="view-employer={{$job->employer->id}}"><img src="{{$job->employer->logo}}" alt=""></a></div>
                            <div class="header-details">
                                <h3>{{$job->title}}</h3>
                                <h5>{{$job->employer->about}}</h5>
                                <ul>
                                    <li><a href="view-employer={{$job->employer->id}}"><i class="icon-material-outline-business"></i> {{$job->employer->name}}</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Job salary </div>
                                <div class="salary-amount">${{$job->salary_min_value}} -> ${{$job->salary_max_value}}</div>
                            </div>
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

                <!-- Description -->
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Job Description</h3>
                    <p>{{$job->description}}.</p>


                </div>


                {{--                job type--}}
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Job Type</h3>
                    <p>{{$job->type}}</p>


                </div>
                {{--                job category--}}
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Job category</h3>
                    <p>{{$job->category->name}} <i {!! $job->category->icon !!}></i> </p>


                </div>

                <!-- Skills -->
                <div class="single-page-section">
                    <h3>Job Tags</h3>

                    <div class="task-tags">
                        <div class="keywords-list">
                            @foreach($tags as $tag)
                                <span class="keyword"><span class="keyword-text">{{$tag}}</span></span>
                            @endforeach
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <!-- Freelancers Bidding -->
                    <div class="boxed-list margin-bottom-60">
                        <div class="margin-top-50"></div>

                        <div class="boxed-list-headline">
                            <h3><i class="icon-material-outline-group"></i> Freelancers Bidding</h3>
                        </div>
                        <ul class="boxed-list-ul">
                            @foreach($job_applications as $job_application)
                            <li>
                                <div class="bid">
                                    <!-- Avatar -->
                                    <div class="bids-avatar">
                                        <div class="freelancer-avatar">
                                            <div class="verified-badge"></div>
                                            <a href="/view-freelancer={{$job_application->freelancer->id}}"><img src="{{$job_application->freelancer->logo}}" alt="freelancer's picture"></a>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="bids-content">
                                        <!-- Name -->
                                        <div class="freelancer-name">
                                            <h4><a href="/view-freelancer={{$job_application->freelancer->id}}">{{$job_application->freelancer->first_name}} {{$job_application->freelancer->last_name}} </a></h4>

                                        </div>
                                    </div>

                                    <!-- Bid -->
                                    <div class="bids-bid">
                                        <div class="bid-rate">
                                            <div class="rate">${{$job_application->bid}}</div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </div>


                <!-- Sidebar -->


            </div>

            <div class="col-xl-4 col-lg-4">
                @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                       <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                     </div>
                 @endif


                <div class="sidebar-container">

                    <div class="countdown green margin-bottom-35">Announced at {{$job->created_at->format('d/m')}} </div>

                    @if(Auth::check() && (Auth::user()->type =='freelancer') )
                        <form action="/job-bid/{{$job_id}}" method="post">
                            @csrf
                            <div class="sidebar-widget">
                                <div class="bidding-widget">
                                    <div class="bidding-headline"><h3>Apply for this job!</h3></div>
                                    <div class="bidding-inner">

                                        <!-- Headline -->
                                        <span class="bidding-detail">Set your <strong>Expected Wage</strong></span>

                                        <!-- Price Slider -->
                                        <div class="bidding-value">$<span id="biddingVal"></span></div>
                                        <input name="bid" class="bidding-slider" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{$job->salary_min_value}}" data-slider-max="{{$job->salary_max_value}}" data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide" />



                                        <!-- Button -->
                                        <button type="submit" id="snackbar-place-bid" class="button ripple-effect move-on-hover full-width margin-top-30"><span>Place a Bid</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>


        <!-- Spacer -->
        <div class="margin-top-15"></div>
        <!-- Spacer / End-->
    </div>

@endsection
