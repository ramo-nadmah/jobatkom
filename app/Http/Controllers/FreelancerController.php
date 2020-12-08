<?php

namespace App\Http\Controllers;

use App\Job_Bid;
use App\Task_Bid;
use Auth;
use App\Freelancer;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FreelancerController extends Controller
{
    //
    public function main()
    {
//        dd(Freelancer::all()->where('user_id',Auth::user()->freelancers[0]->id)->count());

        $exists=Freelancer::all()->where('user_id',Auth::user()->id)->count();
            if($exists)
            {
                $freelancer_record = DB::table('freelancers')->where('user_id', Auth::user()->id)->get();
//                dd($freelancer_record[0]->first_name);
                $first_name=$freelancer_record[0]->first_name;
                $last_name=$freelancer_record[0]->last_name;
                $hourly_rate=$freelancer_record[0]->minimal_hourly_rate;
                $skills =$freelancer_record[0]->skills;
                $tagline=$freelancer_record[0]->tagline;
                $nationality=$freelancer_record[0]->nationality;
                $description=$freelancer_record[0]->description;
                $tasks_done=$freelancer_record[0]->tasks_done;
                $image=$freelancer_record[0]->logo;

                $freelancer_id=Freelancer::where('user_id',Auth::user()->id)->value('id');
                $bids_won=Task_Bid::where('freelancer_id',$freelancer_id)->where('status','approved')->count();
                $jobs_applied=Job_Bid::where('freelancer_id',$freelancer_id)->count();

                $email=Auth::user()->email;
                return view('freelancer-settings',compact(['first_name','last_name','hourly_rate','skills','tagline','nationality','description','tasks_done','image','email','bids_won','jobs_applied']));
            }

            else
            {


                $first_name=" ";
                $last_name=" ";
                $hourly_rate=5;
                $skills =' ';
                $tagline=" ";
                $nationality=" ";
                $description=" ";
                $tasks_done=0;
                $image="https://jobatkom.s3.amazonaws.com/images/cXL15ScKvJWxEee2zY6uNSaHzMM5jfxnk2bcfq0Z.png";
                $email=DB::table('users')->where('id', Auth::user()->id)->value('email');
                $bids_won=0;
                $jobs_applied=0;

                return view('freelancer-settings',compact(['first_name','last_name','hourly_rate','skills','tagline','nationality','description','tasks_done','image','email','bids_won','jobs_applied']));
            }



    }


    public function saveFreelancersData(Request $request)
    {
        if($request->email != DB::table('users')->where('id', Auth::user()->id)->value('email'))
        {
            $this->validate($request, [

                'email'=>'unique:users',
                'firstName'=>'required',
                'lastName'=>'required',
                'hourly_rate'=>'required',
                'skills'=>'required',
                'tagline'=>'required',
                'nationality'=>'required',
                'description'=>'required',



//            'password' => 'required|min:6',
//            'password-confirmation'=>'required|min:6|same:password'
//            confirmed|
            ]);

            $user=User::where('id',Auth::user()->id)->update(
                [
                    'email'=>$request->email,
                ]
            );
        }
        else
        {
            $this->validate($request, [


                'firstName'=>'required',
                'lastName'=>'required',
                'hourly_rate'=>'required',
                'skills'=>'required',
                'tagline'=>'required',
                'nationality'=>'required',
                'description'=>'required',



//            'password' => 'required|min:6',
//            'password-confirmation'=>'required|min:6|same:password'
//            confirmed|
            ]);
        }



        if(DB::table('freelancers')->where('user_id', Auth::user()->id)->value('tasks_done') == null)
            $tasks_done=0;
        else
            $tasks_done=DB::table('freelancers')->where('user_id', Auth::user()->id)->value('tasks_done');

//        $number=Freelancer::all()->where('user_id',$id)->count();
        if($request->image ==null)
            $name="https://jobatkom.s3.amazonaws.com/images/cXL15ScKvJWxEee2zY6uNSaHzMM5jfxnk2bcfq0Z.png";
        else
        {

//            ================================== s3 storage implementation



            $path=$request->file('image')->store('images','s3');
//        dd($path);

            Storage::disk('s3')->setVisibility($path,'public');
            $name=Storage::disk('s3')->url($path);


//            =================================================================
        }







//        $exists=
       $freelancer=Freelancer::updateOrCreate(
           ['user_id'=>Auth::user()->id]
           ,
           [
            'first_name'=>$request->firstName,
            'last_name'=>$request->lastName,
            'minimal_hourly_rate'=>$request->hourly_rate,
            'skills'=> $request->skills,
            'tagline'=>$request->tagline,
            'nationality'=>$request->nationality,
            'description'=>$request->description,
            'tasks_done'=>$tasks_done,
            'logo'=>$name,
           ]

       );


        return redirect('/');
    }

    public function viewFreelancer($id)
    {
        $exist=Freelancer::where('id',$id)->count();
        if($exist)
        {
            $freelancer=Freelancer::find($id);
            $skills=Str::of($freelancer->skills)->explode(' ');

            return view('single-freelancer-profile',compact(['freelancer','skills']));
        }
        else
            return back();

    }

    public function browseFreelancers()
    {
        $freelancers=Freelancer::paginate(8);
        return view('freelancers-grid-layout',compact(['freelancers']));
    }

    public function filterFreelancers(Request $request)
    {
//        dd($request->type[0],count($request->type));
//        if($request->filled('keyword'))
//        {
//            if($request->filled('category'))
//            {
//                if($request->filled('type'))
//                {
//                    $freelancers=Freelancer::where('type',$request->type)->where('category_id',$request->category)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//                else
//                {
//                    $freelancers=Freelancer::where('category_id',$request->category)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//            }
//            else
//            {
//                if($request->filled('type'))
//                {
//                    $freelancers=Freelancer::where('type',$request->type)->where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
//                }
//                else
//                {
//                    $freelancers=Freelancer::where('title', 'like', '%' . $request->keyword . '%')->paginate(8);
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
//                    $freelancers=Freelancer::where('type',$request->type)->where('category_id',$request->category)->paginate(8);
//                }
//                else
//                {
//                    $freelancers=Freelancer::where('category_id',$request->category)->paginate(8);
//                }
//            }
//            else
//            {
//                if($request->filled('type'))
//                {
//                    $freelancers=Freelancer::where('type',$request->type)->paginate(8);
//                }
//                else
//                {
//                    $freelancers=Freelancer::paginate(8);
//                }
//
//
//            }
//        }

        if($request->filled('keyword'))
        {
            $keyword=Freelancer::where('tagline', 'like', '%' . $request->keyword . '%')->orwhere('description', 'like', '%' . $request->keyword . '%')->orwhere('skills', 'like', '%' . $request->keyword . '%');
        }
        else
        {
            $keyword=Freelancer::where('id','<',0);
        }
//=========================================================================
        if($request->filled('name'))
        {
            $name=Freelancer::where('first_name', 'like', '%' . $request->name . '%' )->orwhere('last_name', 'like', '%' . $request->name . '%' );

        }
        else
        {
            $name=Freelancer::where('id','<',0);

        }
//=========================================================================
//        if($request->filled('type'))
//        {
////            dd($request->type);
//            $type=Freelancer::where('id','<',0);
//            for($i=0;$i<count($request->type);$i++)
//            {
////                $subquery=Freelancer::where('type',$request->type[$i]);
//
//
//                $typth=Freelancer::where('type',$request->type[$i]);
//                $type=$type->union($typth);
//            }
//        }
//        else
//        {
//            $type=Freelancer::where('id','<',0);
//
//        }
//        SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'union (select * from `Freelancers` where `type` = ?) union (select * from `Freelancers` where ' at line 1 (SQL: select count(*) as aggregate from ((select * from `Freelancers` where `id` < 0) union (select * from `Freelancers` where `title` like %2%) union (select * from `Freelancers` where `id` < 0) union ((select * from `Freelancers` where `id` < 0) union (select * from `Freelancers` where `type` = freelance) union (select * from `Freelancers` where `type` = fulltime) union (select * from `Freelancers` where `type` = parttime) union (select * from `Freelancers` where `type` = internship) union (select * from `Freelancers` where `type` = temporary))) as `temp_table`)

//        SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'union all (select * from `Freelancers` where `type` = ?) union all (select * from `Freelancers' at line 1 (SQL: select count(*) as aggregate from ((select * from `Freelancers` where `id` < 0) union (select * from `Freelancers` where `title` like %2%) union (select * from `Freelancers` where `id` < 0) union ((select * from `Freelancers` where `id` < 0) union all (select * from `Freelancers` where `type` = freelance) union all (select * from `Freelancers` where `type` = fulltime) union all (select * from `Freelancers` where `type` = parttime) union all (select * from `Freelancers` where `type` = internship) union all (select * from `Freelancers` where `type` = temporary))) as `temp_table`)
//        dd($type->get(),$keyword->get());
//        $x='shit';
//        foreach($request->type as $shit)
//        {
//            $x=$x.$shit;
//        }
////        dd($x);
        $freelancers=Freelancer::where('id','<',0)->union($name)->union($keyword)->paginate(8);
//        $freelancers=Freelancer::where('id','<',0)->union($category)->union($keyword)->union($type);
//        dd($freelancers);


//        dd($freelancers);

        return view('freelancers-grid-layout',compact(['freelancers']));



//        $freelancers=Freelancer::where('title', 'like', '%' . $request->keyword . '%')->union($type)->get();



    }




}
