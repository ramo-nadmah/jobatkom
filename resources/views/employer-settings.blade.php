@extends('layout.app')
@section('content')

<!-- Dashboard Container -->


{{--	<!-- Dashboard Sidebar -->--}}
{{--	<div class="dashboard-sidebar">--}}
{{--		<div class="dashboard-sidebar-inner" data-simplebar>--}}
{{--			<div class="dashboard-nav-container">--}}

{{--				<!-- Responsive Navigation Trigger -->--}}
{{--				<a href="#" class="dashboard-responsive-nav-trigger">--}}
{{--					<span class="hamburger hamburger--collapse" >--}}
{{--						<span class="hamburger-box">--}}
{{--							<span class="hamburger-inner"></span>--}}
{{--						</span>--}}
{{--					</span>--}}
{{--					<span class="trigger-title">Dashboard Navigation</span>--}}
{{--				</a>--}}

{{--				<!-- Navigation -->--}}
{{--				<div class="dashboard-nav">--}}
{{--					<div class="dashboard-nav-inner">--}}

{{--						<ul data-submenu-title="Start">--}}
{{--							<li><a href="dashboard.html"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>--}}
{{--							<li><a href="dashboard-messages.html"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>--}}
{{--							<li><a href="dashboard-bookmarks.html"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>--}}
{{--							<li><a href="dashboard-reviews.html"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>--}}
{{--						</ul>--}}

{{--						<ul data-submenu-title="Organize and Manage">--}}
{{--							<li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>--}}
{{--								<ul>--}}
{{--									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>--}}
{{--									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>--}}
{{--									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--							<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>--}}
{{--								<ul>--}}
{{--									<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>--}}
{{--									<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>--}}
{{--									<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>--}}
{{--									<li><a href="dashboard-post-a-task.html">Post a Task</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--						</ul>--}}

{{--						<ul data-submenu-title="Account">--}}
{{--							<li class="active"><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>--}}
{{--							<li><a href="index-logged-out.html"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>--}}
{{--						</ul>--}}

{{--					</div>--}}
{{--				</div>--}}
{{--				<!-- Navigation / End -->--}}

{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--	<!-- Dashboard Sidebar / End -->--}}


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Settings</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Settings</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">

                <div class="col-xl-12">
                    <form action="/employer-info" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">

                                <div class="row">

                                    <div class="col-auto">
                                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                            <img class="profile-pic" src="{{$image}}" alt="freelancers_image" />
                                            <div class="upload-button"></div>
                                            <input id="image" name="image" class="file-upload" type="file" accept="image/*"/>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Employer Name</h5>
                                                    <input type="text" class="with-border" name="name" value="{{$name}}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Location</h5>
                                                    <input type="text" class="with-border" name="location" value="{{$location}}">
                                                </div>
                                            </div>



                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>Email</h5>
                                                    <input type="text" class="with-border" name="email" value="{{$email}}">
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-face"></i> My Profile</h3>
                            </div>

                            <div class="content">
                                <ul class="fields-ul">

                                    <li>
                                        <div class="row">


                                             <div class="col-xl-12">
                                               <h5>select your field :{{$category}}</h5>
                                                <select name="category" id="category" class="form-control">
                                                     @foreach($categories as $category)
                                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                                     @endforeach
                                                </select>
                                             </div>




                                        </div>
                                    </li>

                                <li>
                                    <div class="row">


                                        <div class="col-xl-12">
                                            <div class="submit-field">
                                                <h5>Employers description</h5>
                                                <textarea name="about"  cols="30" rows="5" class="with-border">{{$about}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                        {{--                    <div class="col-xl-12">--}}
{{--                        <div id="test1" class="dashboard-box">--}}

{{--                            <!-- Headline -->--}}
{{--                            <div class="headline">--}}
{{--                                <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>--}}
{{--                            </div>--}}

{{--                            <div class="content with-padding">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="submit-field">--}}
{{--                                            <h5>Current Password</h5>--}}
{{--                                            <input name="password" type="password" class="with-border">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="submit-field">--}}
{{--                                            <h5>New Password</h5>--}}
{{--                                            <input name="new-password" type="password" class="with-border">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xl-4">--}}
{{--                                        <div class="submit-field">--}}
{{--                                            <h5>Repeat New Password</h5>--}}
{{--                                            <input name="confirm-new-password" type="password" class="with-border">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-xl-12">--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" id="two-step" checked>--}}
{{--                                            <label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step Verification via Email</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Button    -->
{{--                        Paaaaaaaaaaaaassssssssword--}}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="col-xl-12">
                        <button  type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
                    </div>
                </form>
                </div>
            </div>
			<!-- Row / End -->

			<!-- Footer -->

		</div>
	</div>
	<!-- Dashboard Content / End -->



<!-- Dashboard Container / End -->
<br><br>

@endsection
