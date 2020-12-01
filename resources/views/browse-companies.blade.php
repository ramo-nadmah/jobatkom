@extends('layout.app')
@section('content')

    <div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Browse Companies</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">Glance</a></li>
						<li>Browse Companies</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="letters-list">

				<a href="/search-employer/a" >A</a>
				<a href="/search-employer/b">B</a>
				<a href="/search-employer/c">C</a>
				<a href="/search-employer/d">D</a>
				<a href="/search-employer/e">E</a>
				<a href="/search-employer/f">F</a>
				<a href="/search-employer/g">G</a>
				<a href="/search-employer/h">H</a>
				<a href="/search-employer/i">I</a>
				<a href="/search-employer/j">J</a>
				<a href="/search-employer/k">K</a>
				<a href="/search-employer/l">L</a>
				<a href="/search-employer/m">M</a>
				<a href="/search-employer/n">N</a>
				<a href="/search-employer/o">O</a>
				<a href="/search-employer/p">P</a>
				<a href="/search-employer/q">Q</a>
				<a href="/search-employer/r">R</a>
				<a href="/search-employer/s">S</a>
				<a href="/search-employer/t">T</a>
				<a href="/search-employer/u">U</a>
				<a href="/search-employer/v">V</a>
				<a href="/search-employer/w">W</a>
				<a href="/search-employer/x">X</a>
				<a href="/search-employer/y">Y</a>
				<a href="/search-employer/z">Z</a>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="companies-list">
                @foreach($employers as $employer)


				<a href="/view-employer={{$employer->id}}" class="company">
					<div class="company-inner-alignment">
						<span class="company-logo"><img src="{{$employer->logo}}" alt="employer logo"></span>
						<h4>{{$employer->name}}</h4>
					</div>
				</a>


                @endforeach
			</div>
		</div>
	</div>

    <!-- Pagination -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <!-- Pagination -->
            <div class="pagination-container margin-top-30 margin-bottom-60 ">
                <nav class="pagination justify-content-center">

                    <div>
                        {{$employers->links()}}
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


<!-- Spacer -->
<div class="margin-top-70"></div>
<!-- Spacer / End-->

<!-- Footer
================================================== -->

<!-- Footer / End -->

<script src="js/custom.js"></script>
@endsection
