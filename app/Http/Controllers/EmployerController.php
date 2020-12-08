<?php

namespace App\Http\Controllers;


use App\Category;
use App\Employer;
use Auth;
use App\Job;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    //
    public function main()
    {


        $exists=Employer::all()->where('user_id',Auth::user()->id)->count();
        if($exists)
        {
            $employer_record = DB::table('employers')->where('user_id',Auth::user()->id)->get();
//            dd(Employer::find($id)->category->name,Category::all());
            $name=$employer_record[0]->name;
            $category=Employer::find(Auth::user()->employers[0]->id)->category->name;
            $categories=Category::all();
            $location=$employer_record[0]->location;
            $about=$employer_record[0]->about;
            $image=$employer_record[0]->logo;
            $email=DB::table('users')->where('id', Auth::user()->id)->value('email');
            return view('employer-settings',compact(['name','location','about','image','email','categories','category']));
        }

        else
        {

            $name=" ";
            $location=" ";
            $about=" ";
            $category=" ";
            $categories=Category::all();
            $image="/images/suits.png";
            $email=DB::table('users')->where('id', Auth::user()->id)->value('email');


            return view('employer-settings',compact(['name','location','about','image','email','categories','category']));
        }



    }


    public function saveEmployersData(Request $request)
    {
        if($request->email != DB::table('users')->where('id', Auth::user()->id)->value('email'))
        {
            $this->validate($request, [

                'email'=>'unique:users',
                'name'=>'required',
                'location'=>'required',
                'about'=>'required',
                'category'=>'required',




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


                'name'=>'required',
                'location'=>'required',
                'about'=>'required',
                'category'=>'required',




//            'password' => 'required|min:6',
//            'password-confirmation'=>'required|min:6|same:password'
//            confirmed|
            ]);
        }




//        $number=Freelancer::all()->where('user_id',$id)->count();
        if($request->image ==null)
            $name='/images/suits.png';
        else
        {


//            ===============================================================      s3 storage implemented

            $path=$request->file('image')->store('images','s3');


            Storage::disk('s3')->setVisibility($path,'public');
            $name=Storage::disk('s3')->url($path);


//            =================================================================
        }





//        $exists=
        $employer=Employer::updateOrCreate(
            ['user_id'=>Auth::user()->id]
            ,
            [
                'name'=>$request->name,
                'location'=>$request->location,
                'about'=>$request->about,
                'category_id'=>$request->category,
                'logo'=>$name,
            ]

        );


        return redirect('/');
    }

    public function viewEmployer($id)
    {
        $employer=Employer::find($id);
        // $employer1=DB::table('employers')->where('id', $id)->get();
        // $employer1[0]->name == $employer->name
        $jobs=Job::where('employer_id',$id)->get();
//dd(Job::all()->where('employer_id',$id)->get());
        return view('single-company-profile',compact(['employer','jobs']));
    }


    public function browseEmployers()
    {
//      dd(Employer::where('name', 'like', '%' . 'a'. '%')->get()); like is case insensitive
        $employers=Employer::where('name', 'like', 'a'. '%')->paginate(6);

        return view('browse-companies',compact(['employers']));
    }

    public function filterEmployers($letter)
    {


            $employers = Employer::where('name', 'like',$letter . '%')->paginate(6);
            return view('browse-companies',compact(['employers']));





//        $jobs=Job::where('title', 'like', '%' . $request->keyword . '%')->union($type)->get();



    }




}
