
<!--Tabs -->
<div class="sign-in-form">

    <ul class="popup-tabs-nav">
        <li><a href="">X</a></li>
    </ul>

    <div class="popup-tabs-container">

        <form action="/edit-job-application/{{$job_application->id}}" method="post">
            @csrf

        <!-- Tab -->
        <div class="popup-tab-content" id="tab">

            <!-- Bidding -->
            <div class="bidding-widget">
                <!-- Headline -->



                <!-- Price Slider -->
                <p>MINIMUM salary is ({{$job_application->job->salary_min_value}}) and MAXIMUM salary is ({{$job_application->job->salary_max_value}})</p>
                <hr>
                <p>please select a new bid</p>
                <input type="text" name="bid" value="{{$job_application->bid}}">
                <hr>


            </div>

            <!-- Button -->
            <button class="button full-width button-sliding-icon ripple-effect" type="submit">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>

        </div>

        </form>
    </div>
</div>
