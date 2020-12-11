<?php

namespace App\Http\Controllers;


use App\Employer;
use App\Freelancer;
use Auth;
use App\Job_Bid;
use Illuminate\Http\Request;

class JobBidController extends Controller
{
    //
    public function main($job_id ,Request $request)
    {
//        dd($request ,Auth::user()->freelancers[0]->id);

        if(Job_Bid::where('freelancer_id',Auth::user()->freelancers[0]->id)->where('job_id',$job_id)->count())
            return back()->with('error','You already have applied for this job');
        else{
        $job_bid=new Job_Bid();
        $job_bid->bid=$request->bid;
        $job_bid->job_id=$job_id;
        $job_bid->freelancer_id=Auth::user()->freelancers[0]->id;
        $job_bid->save();
        return back()->with('success','Applied successfully!');    }
    }

    public function showFreelancerApplications()
    {
        if(Freelancer::where('user_id',Auth::user()->id)->count())
        {

            $job_applications=Job_Bid::all()->where('freelancer_id',Auth::user()->freelancers[0]->id);
            return view('dashboard-my-active-applications',compact(['job_applications']));

        }
        else
            return back();
    }

    public function editFreelancerApplication($application_id,Request $request)
    {
        $job_application=Job_bid::find($application_id);
        $this->validate($request, [

            'bid' => 'required|numeric|min:'.$job_application->job->salary_min_value .'|max:'.$job_application->job->salary_max_value,


//            confirmed|
        ]);
        $job_application=Job_Bid::find($application_id);
        $job_application->bid=$request->bid;
        $job_application->save();
        return back();
    }
    public function deleteFreelancerApplication($application_id)
    {
        $job_application=Job_Bid::find($application_id)->where('freelancer_id',Auth::user()->freelancers[0]->id)->delete();
        return back();
    }

    public function acceptJobRequest($job_bid_id)
    {
        $job_bid=Job_Bid::find($job_bid_id);
        $job_bid->status="approved";
        $job_bid->save();
        return back();
    }
    public function rejectJobRequest($job_bid_id)
    {
        $job_bid=Job_Bid::find($job_bid_id);
        $job_bid->status="rejected";
        $job_bid->save();
        return back();
    }

}
