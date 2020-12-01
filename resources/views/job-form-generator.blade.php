
<!--Tabs -->

<div class="sign-in-form">

    <ul class="popup-tabs-nav">
        <li><a href=""><strong>X</strong></a></li>
    </ul>

    <div class="popup-tabs-container">

        <form action="/edit-job/{{$job->id}}" method="post">
            @csrf

        <!-- Tab -->
        <div class="popup-tab-content" id="tab">

            <!-- Bidding -->
            <div class="bidding-widget">
                <!-- Headline -->




                <p>Job <strong> Type </strong> :{{$job->type}}</p>
                <select name="type" id="type"  >
                    <option value="freelance">Freelance</option>
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                    <option value="temporary">Temporary</option>
                    <option value="internship">Internship</option>

                </select>
                <hr>


                <p>please enter a new <strong>Lowest salary:</strong></p>
                <input type="text" name="salary_min_value" value="{{$job->salary_min_value}}">
                <hr>

                <p>please enter a new <strong>Highest salary:</strong></p>
                <input type="text" name="salary_max_value" value="{{$job->salary_max_value}}">
                <hr>

                <p>please choose a new  <strong>tags</strong> : </p>
                <input  type="text" name="tags" value="{{$job->tags}}" >
                <hr>

                <p>select your <strong>category</strong> :{{$job->category->name}} </p>
                <select name="category" >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>


                <p>please write a new <strong>description:</strong></p>
                <textarea  name="description" >{{$job->description}}</textarea>
                <hr>

            </div>


            <!-- Button -->
            <button class="button full-width button-sliding-icon ripple-effect" type="submit">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>
        </div>

        </form>
    </div>
</div>
