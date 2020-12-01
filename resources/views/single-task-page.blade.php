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
                            <div class="header-image"><a href="view-employer={{$task->employer->id}}"><img src="{{$task->employer->logo}}" alt=""></a></div>
                            <div class="header-details">
                                <h3>{{$task->name}}</h3>
                                <h5>{{$task->employer->about}}</h5>
                                <ul>
                                    <li><a href="view-employer={{$task->employer->id}}"><i class="icon-material-outline-business"></i> {{$task->employer->name}}</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Project Budget</div>
                                <div class="salary-amount">${{$task->min_budget}} -> ${{$task->max_budget}}</div>
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
                    <h3 class="margin-bottom-25">Project Description</h3>
                    <p>{{$task->description}}.</p>
                </div>

                <!-- Skills -->
                <div class="single-page-section">
                    <h3>Skills Required</h3>

                    <div class="task-tags">
                        <div class="keywords-list">
                            @foreach($skills as $skill)
                                <span class="keyword"><span class="keyword-text">{{$skill}}</span></span>
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
                        @foreach($task_bids as $task_bid)
                        <li>
                            <div class="bid">
                                <!-- Avatar -->
                                <div class="bids-avatar">
                                    <div class="freelancer-avatar">
                                        <div class="verified-badge"></div>
                                        <a href="/view-freelancer={{$task_bid->freelancer->id}}"><img src="{{$task_bid->freelancer->logo}}" alt="freelancers picture"></a>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="bids-content">
                                    <!-- Name -->
                                    <div class="freelancer-name">
                                        <h4><a href="/view-freelancer={{$task_bid->freelancer->id}}">{{$task_bid->freelancer->first_name}} {{$task_bid->freelancer->last_name}}</a></h4>
                                        <p>From {{$task_bid->freelancer->nationality}}</p>
                                    </div>
                                </div>

                                <!-- Bid -->
                                <div class="bids-bid">
                                    <div class="bid-rate">
                                        <div class="rate">${{$task_bid->bid}}</div>
                                        <span>in {{$task_bid->time_quantity}} {{$task_bid->time}}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>

        </div>
            <!-- Sidebar -->
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

                    <div class="countdown green margin-bottom-35">Announced at {{$task->created_at->format('d/m')}} </div>

                    @if(Auth::check() && (Auth::user()->type =='freelancer') )
                        <form action="/task-bid/{{$task_id}}" method="post">
                            @csrf
                            <div class="sidebar-widget">
                                <div class="bidding-widget">
                                    <div class="bidding-headline"><h3>Bid on this task!</h3></div>
                                    <div class="bidding-inner">

                                        <!-- Headline -->
                                        <span class="bidding-detail">Set your <strong>minimal rate</strong></span>

                                        <!-- Price Slider -->
                                        <div class="bidding-value">$<span id="biddingVal"></span></div>
                                        <input name="bid" class="bidding-slider" type="text" value="" data-slider-handle="custom" data-slider-currency="$" data-slider-min="{{$task->min_budget}}" data-slider-max="{{$task->max_budget}}" data-slider-value="auto" data-slider-step="50" data-slider-tooltip="hide" />

                                        <!-- Headline -->
                                        <span class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>

                                        <!-- Fields -->
                                        <div class="bidding-fields">
                                            <div class="bidding-field">
                                                <!-- Quantity Buttons -->
                                                <div class="qtyButtons">
                                                    <div class="qtyDec"></div>
                                                    <input  type="text" name="time_quantity" value="1">
                                                    <div class="qtyInc"></div>
                                                </div>
                                            </div>
                                            <div class="bidding-field">
                                                <select name="time" class="selectpicker default">
                                                    <option value="days" selected>Days</option>
                                                    <option value="hours" >Hours</option>
                                                </select>
                                            </div>
                                        </div>

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
    </div>


    <!-- Spacer -->

    <!-- Spacer / End-->
@endsection
