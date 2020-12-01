@extends('layout.app')

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Register</h2>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs" class="dark">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Register</li>
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
                        <h3 style="font-size: 26px;">Let's create your account!</h3>
                        <span>Already have an account? <a href="/login">Log In!</a></span>
                    </div>

                    <!-- Account Type -->


                    <!-- Form -->
                    <form method="post" action="/register" >
                        @csrf
                        <div class="account-type">
                            <div>
                                <input type="radio" name="account_type" id="freelancer-radio" class="account-type-radio" value="freelancer" checked/>
                                <label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
                            </div>

                            <div>
                                <input type="radio" name="account_type" id="employer-radio" class="account-type-radio" value="employer"/>
                                <label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
                            </div>
                        </div>
                        <div class="input-with-icon-left">
                            <i class="icon-material-baseline-mail-outline"></i>
                            <input type="text" class="input-text with-border" name="email" id="emailaddress-register" placeholder="Email Address" required/>
                        </div>

                        <div class="input-with-icon-left" title="Should be at least 8 characters long" data-tippy-placement="bottom">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password" id="password-register" placeholder="Password" required/>
                        </div>

                        <div class="input-with-icon-left">
                            <i class="icon-material-outline-lock"></i>
                            <input type="password" class="input-text with-border" name="password_confirmation" id="password-repeat-register" placeholder="Repeat Password" required/>
                        </div>
                        <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" >Register <i class="icon-material-outline-arrow-right-alt"></i></button>
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
