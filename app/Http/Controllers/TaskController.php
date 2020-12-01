<?php

namespace App\Http\Controllers;

use App\Task_Bid;
use Auth;
use App\Category;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    //



    public function viewPostTask()
    {
        $categories=Category::all();

        return view('post-a-task',compact(['categories']));
    }

    public function postTask(Request $request)
    {
//        dd(Auth::user()->employers[0]->id);
        $this->validate($request, [

            'name'=>'required',
            'min_budget'=>'required|numeric',
            'max_budget'=>'required|numeric',
            'skills'=>'required',
            'description'=>'required',

        ]);
        $task=new Task();
        $task->name=$request->name;
        $task->category_id=$request->category;
        $task->min_budget=$request->min_budget;
        $task->max_budget=$request->max_budget;
        $task->skills=$request->skills;
        $task->description=$request->description;
        $task->employer_id=Auth::user()->employers[0]->id;
        $task->save();
        return  redirect('/task='.$task->id);
    }

    public function viewSingleTask($task_id)
    {
        $task=Task::find($task_id);
//        dd(Task::find($task_id));
        $task_bids=Task_Bid::where('task_id',$task_id)->get();
        $skills=Str::of($task->skills)->explode(' ');
        return view('single-task-page',compact(['task','skills','task_id','task_bids']));
    }

    public function manageEmployerTasks()
    {
        $employer_tasks=Task::where('employer_id',Auth::user()->employers[0]->id)->get();

        return view('dashboard-manage-tasks',compact(['employer_tasks']));
    }

    public function editTask($task_id,Request $request)
    {
        $this->validate($request, [

            'name'=>'required',
            'minimum_budget'=>'numeric|required',
            'maximum_budget'=>'numeric|required',
            'skills'=>'required',
            'description'=>'required',

        ]);
        $task=Task::find($task_id);
        $task->name=$request->name;
        $task->min_budget=$request->minimum_budget;
        $task->max_budget=$request->maximum_budget;
        $task->skills=$request->skills;
        $task->description=$request->description;
        $task->category_id=$request->category;
        $task->save();
        return back();
    }

    public function deleteTask($task_id)
    {
//      dd(Task::where('id',$task_id)->get());
        $task=Task::where('id',$task_id)->where('employer_id',Auth::user()->employers[0]->id)->delete();
        $task_bids=Task_Bid::where('task_id',$task_id)->delete();
        return back();
    }

    public function showBidders($task_id)
    {
        $task=Task::where('id',$task_id)->where('employer_id',Auth::user()->employers[0]->id)->get();

        $task_bids=Task::find($task_id)->where('employer_id',Auth::user()->employers[0]->id)->firstorfail()->task_bids()->get();
        return view('dashboard-manage-bidders',compact(['task','task_bids']));
    }

    public function browseTasks()
    {
        $tasks=Task::paginate(8);
        $categories=Category::all();
        return view('Tasks-grid-layout',compact(['tasks','categories']));
    }

    public function filterTasks(Request $request)
    {
//        dd($request->type[0],count($request->type));
//        if($request->filled('keyword'))
//        {
//            if($request->filled('category'))
//            {
//                if($request->filled('type'))
//                {
//                    $tasks=Task::where('type',$request->type)->where('category_id',$request->category)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//                else
//                {
//                    $tasks=Task::where('category_id',$request->category)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//            }
//            else
//            {
//                if($request->filled('type'))
//                {
//                    $tasks=Task::where('type',$request->type)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//                else
//                {
//                    $tasks=Task::where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
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
//                    $tasks=Task::where('type',$request->type)->where('category_id',$request->category)->paginate(8);
//                }
//                else
//                {
//                    $tasks=Task::where('category_id',$request->category)->paginate(8);
//                }
//            }
//            else
//            {
//                if($request->filled('type'))
//                {
//                    $tasks=Task::where('type',$request->type)->paginate(8);
//                }
//                else
//                {
//                    $tasks=Task::paginate(8);
//                }
//
//
//            }
//        }



        if($request->filled('keyword'))
        {
            $keyword=Task::where('name', 'like', '%' . $request->keyword . '%')->orwhere('skills', 'like', '%' . $request->keyword . '%')->orwhere('description', 'like', '%' . $request->keyword . '%');
        }
        else
        {
            $keyword=Task::where('id','<',0);
        }

//=========================================================================
        if($request->filled('category'))
        {
            $category=Task::where('category_id', $request->category );

        }
        else
        {
            $category=Task::where('id','<',0);

        }
//=========================================================================
//        if($request->filled('type'))
//        {
////            dd($request->type);
//            $type=Task::where('id','<',0);
//            for($i=0;$i<count($request->type);$i++)
//            {
////                $subquery=Task::where('type',$request->type[$i]);
//
//
//                $typth=Task::where('type',$request->type[$i]);
//                $type=$type->union($typth);
//            }
//        }
//        else
//        {
//            $type=Task::where('id','<',0);
//
//        }
//        SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'union (select * from `Tasks` where `type` = ?) union (select * from `Tasks` where ' at line 1 (SQL: select count(*) as aggregate from ((select * from `Tasks` where `id` < 0) union (select * from `Tasks` where `title` like %2%) union (select * from `Tasks` where `id` < 0) union ((select * from `Tasks` where `id` < 0) union (select * from `Tasks` where `type` = freelance) union (select * from `Tasks` where `type` = fulltime) union (select * from `Tasks` where `type` = parttime) union (select * from `Tasks` where `type` = internship) union (select * from `Tasks` where `type` = temporary))) as `temp_table`)

//        SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'union all (select * from `Tasks` where `type` = ?) union all (select * from `Tasks' at line 1 (SQL: select count(*) as aggregate from ((select * from `Tasks` where `id` < 0) union (select * from `Tasks` where `title` like %2%) union (select * from `Tasks` where `id` < 0) union ((select * from `Tasks` where `id` < 0) union all (select * from `Tasks` where `type` = freelance) union all (select * from `Tasks` where `type` = fulltime) union all (select * from `Tasks` where `type` = parttime) union all (select * from `Tasks` where `type` = internship) union all (select * from `Tasks` where `type` = temporary))) as `temp_table`)
//        dd($type->get(),$keyword->get());
//        $x='shit';
//        foreach($request->type as $shit)
//        {
//            $x=$x.$shit;
//        }
////        dd($x);
        $tasks=Task::where('id','<',0)->union($category)->union($keyword)->paginate(8);
//        $tasks=Task::where('id','<',0)->union($category)->union($keyword)->union($type);
//        dd($tasks);


//        dd($tasks);
        $categories=Category::all();
        return view('Tasks-grid-layout',compact(['tasks','categories']));



//        $tasks=Task::where('title', 'like', '%' . $request->keyword . '%')->union($type)->get();



    }





}
