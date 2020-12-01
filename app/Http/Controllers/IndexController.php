<?php

namespace App\Http\Controllers;

use App\Category;
use App\Employer;
use App\Freelancer;
use App\Job;
use App\Task;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class IndexController extends Controller
{
    //


    public function main()
    {
        $jobs_posted=Job::all()->count();
        $tasks_posted=Task::all()->count();
        $freelancers=Freelancer::all()->count();
        $categories=Category::all();
        $latest_jobs=Job::orderBy('updated_at', 'desc')->take(5)->get();
        $latest_freelancers=Freelancer::orderBy('created_at', 'desc')->take(6)->get();


        return view("index",compact(['jobs_posted','tasks_posted','freelancers','categories','latest_jobs','latest_freelancers']));
    }


    public function check()
    {
        $user_id=  Auth::user()->id;
        if (Auth::user()->type === "freelancer")
        {

            if(! Freelancer::where('user_id',Auth::user()->id)->count() )
            {
                $route = "/freelancer-info";
                return redirect($route);
            }
             else
                return redirect('/');
        }
        else if(Auth::user()->type === "employer")
        {
            if(! Employer::where('user_id',Auth::user()->id)->count())
            {
                $route="/employer-info";
                return redirect( $route);
            }

            else
                return redirect('/');

        }
    }
}
