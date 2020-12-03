<?php

namespace App\Http\Controllers;
use Auth;
use App\Job_Bid;
use App\Category;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    //

    public function viewPostJob()
    {
        $categories=Category::all();
        return view('post-a-job',compact(['categories']));
    }
    public function postJob(Request $request)
    {
        $this->validate($request, [

            'title'=>'required',
            'salary_min_value'=>'required|numeric',
            'salary_max_value'=>'required|numeric',
            'tags'=>'required',
            'category'=>'required',
            'description'=>'required',
            'type'=>'required',

        ]);
        $job=new Job();
        $job->title=$request->title;
        $job->type=$request->type;
        $job->salary_min_value=$request->salary_min_value;
        $job->salary_max_value=$request->salary_max_value;
        $job->tags=$request->tags;
        $job->description=$request->description;
        $job->category_id=$request->category;
        $job->employer_id=Auth::user()->employers[0]->id;
        $job->save();
        return  redirect('/job='.$job->id);
    }

    public function viewSingleJob($job_id)
    {
        $job=Job::find($job_id);
        $tags=Str::of($job->tags)->explode(' ');
        $job_applications=Job_Bid::where('job_id',$job_id)->get();

        return view('single-job-page',compact(['job','tags','job_id','job_applications']));
    }

    public function manageEmployerJobs()
    {
        $employer_jobs=Job::where('employer_id',Auth::user()->employers[0]->id)->get();

        return view('dashboard-manage-jobs',compact(['employer_jobs']));
    }

    public function editJob($job_id,Request $request)
    {
        $this->validate($request, [

            'title'=>'required',
            'salary_min_value'=>'numeric|required',
            'salary_max_value'=>'numeric|required',
            'tags'=>'required',
            'description'=>'required',

        ]);
        $job=Job::find($job_id);
        $job->title=$request->title;
        $job->type=$request->type;
        $job->salary_min_value=$request->salary_min_value;
        $job->salary_max_value=$request->salary_max_value;
        $job->tags=$request->tags;
        $job->description=$request->description;
        $job->category_id=$request->category;
        $job->save();
        return back();
    }
    public function deleteJob($job_id)
    {
        $job=Job::where('id',$job_id)->where('employer_id',Auth::user()->employers[0]->id)->delete();
        $job_bids=Job_Bid::where('job_id',$job_id)->delete();
        return back();
    }

    public function showCandidates($job_id)
    {
//        dd(Job::where('id',$job_id)->where('employer_id',Auth::user()->employers[0]->id)->get());
        $job=Job::where('id',$job_id)->where('employer_id',Auth::user()->employers[0]->id)->get();
//      dd(Job::find($job_id)->where('employer_id',Auth::user()->employers[0]->id)->firstorfail()->job_bids()->get());
        $job_bids=Job::find($job_id)->where('employer_id',Auth::user()->employers[0]->id)->firstorfail()->job_bids()->get();
//      dd(Job::where('id',$job_id)->where('employer_id',Auth::user()->employers[0]->id)->jobBids);
//        $job_bids=$job->job_Bids()->all();

        return view('dashboard-manage-candidates',compact(['job','job_bids']));
    }

    public function browseJobs()
    {
        $jobs=Job::paginate(8);
        $categories=Category::all();
        return view('jobs-grid-layout',compact(['jobs','categories']));
    }

    public function filterJobs(Request $request)
    {
//        dd($request->type[0],count($request->type));
//        if($request->filled('keyword'))
//        {
//            if($request->filled('category'))
//            {
//                if($request->filled('type'))
//                {
//                    $jobs=Job::where('type',$request->type)->where('category_id',$request->category)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//                else
//                {
//                    $jobs=Job::where('category_id',$request->category)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//            }
//            else
//            {
//                if($request->filled('type'))
//                {
//                    $jobs=Job::where('type',$request->type)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//                else
//                {
//                    $jobs=Job::where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//
//
//            }
//
//        }else
//        {
//            if($request->filled('category'))
//            {
//                if($request->filled('type'))
//                {
//                    $jobs=Job::where('type',$request->type)->where('category_id',$request->category)->paginate(8);
//                }
//                else
//                {
//                    $jobs=Job::where('category_id',$request->category)->paginate(8);
//                }
//            }
//            else
//            {
//                if($request->filled('type'))
//                {
//                    $jobs=Job::where('type',$request->type)->paginate(8);
//                }
//                else
//                {
//                    $jobs=Job::paginate(8);
//                }
//
//
//            }
//        }

        if($request->filled('keyword'))
        {
            $keyword=Job::where('title', 'like', '%' . $request->keyword . '%');
        }
        else
        {
            $keyword=Job::where('id','<',0);
        }
//=========================================================================
        if($request->filled('category'))
        {
            $category=Job::where('category_id', $request->category );

        }
        else
        {
            $category=Job::where('id','<',0);

        }
//=========================================================================
//        if($request->filled('type'))
//        {
////            dd($request->type);
//            $type=Job::where('id','<',0);
//            for($i=0;$i<count($request->type);$i++)
//            {
////                $subquery=Job::where('type',$request->type[$i]);
//
//
//                $typth=Job::where('type',$request->type[$i]);
//                $type=$type->union($typth);
//            }
//        }
//        else
//        {
//            $type=Job::where('id','<',0);
//
//        }
//        SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'union (select * from `jobs` where `type` = ?) union (select * from `jobs` where ' at line 1 (SQL: select count(*) as aggregate from ((select * from `jobs` where `id` < 0) union (select * from `jobs` where `title` like %2%) union (select * from `jobs` where `id` < 0) union ((select * from `jobs` where `id` < 0) union (select * from `jobs` where `type` = freelance) union (select * from `jobs` where `type` = fulltime) union (select * from `jobs` where `type` = parttime) union (select * from `jobs` where `type` = internship) union (select * from `jobs` where `type` = temporary))) as `temp_table`)

//        SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'union all (select * from `jobs` where `type` = ?) union all (select * from `jobs' at line 1 (SQL: select count(*) as aggregate from ((select * from `jobs` where `id` < 0) union (select * from `jobs` where `title` like %2%) union (select * from `jobs` where `id` < 0) union ((select * from `jobs` where `id` < 0) union all (select * from `jobs` where `type` = freelance) union all (select * from `jobs` where `type` = fulltime) union all (select * from `jobs` where `type` = parttime) union all (select * from `jobs` where `type` = internship) union all (select * from `jobs` where `type` = temporary))) as `temp_table`)
//        dd($type->get(),$keyword->get());
//        $x='shit';
//        foreach($request->type as $shit)
//        {
//            $x=$x.$shit;
//        }
////        dd($x);
        $jobs=Job::where('id','<',0)->union($category)->union($keyword)->paginate(8);
//        $jobs=Job::where('id','<',0)->union($category)->union($keyword)->union($type);
//        dd($jobs);


//        dd($jobs);
        $categories=Category::all();
        return view('jobs-grid-layout',compact(['jobs','categories']));



//        $jobs=Job::where('title', 'like', '%' . $request->keyword . '%')->union($type)->get();



    }



}
