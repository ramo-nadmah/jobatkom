@extends('layout.app')

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Login</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Login</li>
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
            <div class="col-xl-5 offset-xl-3">

                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <h3 style="font-size: 26px;">We're glad to see you again!</h3>
                        <span>Don't have an account? <a href="/register">Sign Up!</a></span>
                    </div>

                    <!-- Account Type -->


                    <!-- Form -->
                    <form method="post" action="/login" >
                        @csrf
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="Email Address" required/>
                        </div>

                        <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Password" required/>
                        </div>

                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >Login <i class="icon-material-outline-arrow-right-alt"></i></button>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>

                    <!-- Button -->
                    {{--				<button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" form="login-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>--}}


                </div>

            </div>
        </div>
    </div>


    <!-- Spacer -->
    <div class="margin-top-70"></div>
    <!-- Spacer / End-->
@endsection
