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
				<h3>Post a Task</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Post a Task</li>
					</ul>
				</nav>
			</div>
            <form action="/post-task" method="post">
                @csrf
                <!-- Row -->
                <div class="row">

                    <!-- Dashboard Box -->
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i> Task Submission Form</h3>
                            </div>

                            <div class="content with-padding padding-bottom-10">
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Project Name</h5>
                                            <input name="name" type="text" class="with-border" placeholder="e.g. build me a website">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <h5>select your category </h5>
                                        <select name="category" id="category" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>What is your estimated budget?</h5>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input name="min_budget" class="with-border" type="text" placeholder="Minimum">
                                                        <i class="currency">$</i>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="input-with-icon">
                                                        <input name="max_budget" class="with-border" type="text" placeholder="Maximum">
                                                        <i class="currency">$</i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>What skills are required? <i class="help-icon" data-tippy-placement="right" title="Up to 5 skills that best describe your project , one word each"></i></h5>
                                            <div class="keywords-container">
                                                <div class="keyword-input-container">
                                                    <input name="skills" type="text" class="keyword-input with-border" />
                                                </div>
                                                {{--                                                    <div class="keywords-list">--}}
                                                {{--                                                        @foreach($skills as $skill)--}}
                                                {{--                                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">{{$skill}}</span></span>--}}
                                                {{--                                                        @endforeach--}}
                                                {{--                                                    </div>--}}
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Describe Your Project</h5>
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
                        <button class="button ripple-effect big margin-top-30" type="submit" ><i class="icon-feather-plus"></i>Post a Task</button>

                    </div>

                </div>
                <!-- Row / End -->

            </form>

        </div>
    </div>
</div>

@endsection
