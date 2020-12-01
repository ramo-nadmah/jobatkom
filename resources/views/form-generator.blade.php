
<!--Tabs -->
<div class="sign-in-form">

    <ul class="popup-tabs-nav">
        <li><a href="">X</a></li>
    </ul>

    <div class="popup-tabs-container">

        <form action="/edit-task-bid/{{$task_bid->id}}" method="post">
            @csrf

        <!-- Tab -->
        <div class="popup-tab-content" id="tab">

            <!-- Bidding -->
            <div class="bidding-widget">
                <!-- Headline -->



                <!-- Price Slider -->
                <p>MINIMUM budget is ({{$task_bid->task->min_budget}}) and MAXIMUM budget is ({{$task_bid->task->max_budget}})</p>
                <hr>
                <p>please select a new bid</p>
                <input type="text" name="bid" value="{{$task_bid->bid}}">
                <hr>

                <p>please type either hours or days  </p>
                <select name="time" >
                    <option >Days</option>
                    <option>Hours</option>
                </select>
                <hr>
                <p>please type delivery time   </p>
                <input type="text" name="delivery_time" value="{{$task_bid->time_quantity}}">
                <hr>
            </div>

            <!-- Button -->
            <button class="button full-width button-sliding-icon ripple-effect" type="submit">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>

        </div>

        </form>
    </div>
</div>
