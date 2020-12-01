
<!--Tabs -->

<div class="sign-in-form">

    <ul class="popup-tabs-nav">
        <li><a href=""><strong>X</strong></a></li>
    </ul>

    <div class="popup-tabs-container">

        <form action="/edit-task/{{$task->id}}" method="post">
            @csrf

        <!-- Tab -->
        <div class="popup-tab-content" id="tab">

            <!-- Bidding -->
            <div class="bidding-widget">
                <!-- Headline -->

                <p>please choose a new <strong>name</strong> for your task:</p>
                <input type="text" name="name" value="{{$task->name}}">
                <hr>


                <p>please enter a new <strong>minimum budget:</strong></p>
                <input type="text" name="minimum_budget" value="{{$task->min_budget}}">
                <hr>

                <p>please enter a new <strong>maximum budget:</strong></p>
                <input type="text" name="maximum_budget" value="{{$task->max_budget}}">
                <hr>

                <p>please choose a new set of <strong>skill's</strong> <mark>and separate each skill by a Comma ( , )</mark>: </p>
                <input  type="text" name="skills" value="{{$task->skills}}" >
                <hr>
                <p>select your category </p>
                <select name="category" >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>


                <p>please write a new <strong>description:</strong></p>
                <textarea  name="description" >{{$task->description}}</textarea>
                <hr>

            </div>


            <!-- Button -->
            <button class="button full-width button-sliding-icon ripple-effect" type="submit">Save Changes <i class="icon-material-outline-arrow-right-alt"></i></button>
        </div>

        </form>
    </div>
</div>
