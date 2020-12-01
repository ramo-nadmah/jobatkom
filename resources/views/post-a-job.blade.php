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
				<h3>Post a Job</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Post a Job</li>
					</ul>
				</nav>
			</div>
            <form action="/post-job" method="post">
            @csrf
                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i> Job Submission Form</h3>
                            </div>

                            <div class="content with-padding padding-bottom-10">
                                <div class="row">

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Title</h5>
                                            <input name="title" type="text" class="with-border">
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Type</h5>
                                            <select name="type" id="type" class="selectpicker default"   title="Types" >
                                                <option value="freelance">Freelance</option>
                                                <option value="fulltime">Full Time</option>
                                                <option value="parttime">Part Time</option>
                                                <option value="temporary">Temporary</option>
                                                <option value="internship">Internship</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <h5>Job category </h5>
                                        <select name="category" class="selectpicker default"  title="All Categories" >
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Salary</h5>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">

                                                        <input name="salary_min_value" class="with-border" type="text" placeholder="Min">
                                                        <i class="currency">$</i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">

                                                        <input name="salary_max_value" class="with-border" type="text" placeholder="Max">
                                                        <i class="currency">$</i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>







                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Tags   <i class="help-icon" data-tippy-placement="right" title="Maximum of 10 tags,one word each"></i></h5>
                                            <div class="keywords-container">
                                                <div class="keyword-input-container">
                                                    <input name="tags" type="text" class="keyword-input with-border" placeholder="e.g. job title, responsibilities"/>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Job Description</h5>
                                            <textarea name="description" cols="30" rows="5" class="with-border"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <button class="button ripple-effect big margin-top-30" type="submit" ><i class="icon-feather-plus"></i>Post a Job</button>

                    </div>
                </div>
                <!-- Row / End -->
            </form>


		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->
@endsection
