<?php

namespace App\Http\Controllers;
use App\Freelancer;
use Auth;
use App\Task_Bid;
use Illuminate\Http\Request;

class TaskBidController extends Controller
{
    //
    public function main($task_id ,Request $request)
    {
//        dd($request ,Auth::user()->freelancers[0]->id);

        if(Task_Bid::where('freelancer_id',Auth::user()->freelancers[0]->id)->where('task_id',$task_id)->count())
            return back()->with('error','You already have submitted a bid for this task');
        else{
            $task_bid=new Task_Bid();
            $task_bid->bid=$request->bid;
            $task_bid->task_id=$task_id;
            $task_bid->freelancer_id=Auth::user()->freelancers[0]->id;
            $task_bid->time=$request->time;
            $task_bid->time_quantity=$request->time_quantity;
            $task_bid->save();
            return back()->with('success','Bid submitted successfully!');    }
    }

    public function showFreelancerBids()
    {
        if(Freelancer::where('user_id',Auth::user()->id)->count())
        {
            $task_bids=Task_Bid::all()->where('freelancer_id',Auth::user()->freelancers[0]->id);
//       dd(Task_Bid::all()->where('freelancer_id',Auth::user()->freelancers[0]->id));
            return view('dashboard-my-active-bids',compact(['task_bids']));
        }
        else
            return back();

    }

    public function editFreelancerBid($bid_id,Request $request)
    {
        $task_bid=Task_Bid::find($bid_id);
        $this->validate($request, [

            'bid' => 'required|numeric|min:'.$task_bid->task->min_budget .'|max:'.$task_bid->task->max_budget,
            'delivery_time'=>'required|numeric'

//            confirmed|
        ]);
        $task_bid=Task_Bid::find($bid_id);
        $task_bid->bid=$request->bid;
        $task_bid->time=$request->time;
        $task_bid->time_quantity=$request->delivery_time;
        $task_bid->save();
        return back();
    }
    public function deleteFreelancerBid($bid_id)
    {
        $task_bid=Task_Bid::find($bid_id)->where('freelancer_id',Auth::user()->freelancers[0]->id)->delete();
        return back();
    }

    public function acceptTaskBid($task_bid_id)
    {
        $task_bid=Task_Bid::find($task_bid_id);
        $freelancer=Freelancer::find($task_bid->freelancer->id);

        if($task_bid->status == null || $task_bid->status == 'rejected')
        {
            $task_bid->status='approved';
            $freelancer->tasks_done=$freelancer->tasks_done+1;

        }
        $freelancer->save();
        $task_bid->save();
        return back();
    }
    public function rejectTaskBid($task_bid_id)
    {
        $task_bid=Task_Bid::find($task_bid_id);
        $freelancer=Freelancer::find($task_bid->freelancer->id);

        if($task_bid->status == null)
        {
            $task_bid->status='rejected';
        }elseif($task_bid->status == 'approved')
        {
            $task_bid->status="rejected";
            $freelancer->tasks_done=$freelancer->tasks_done-1;
        }
        $freelancer->save();
        $task_bid->save();
        return back();
    }
}
