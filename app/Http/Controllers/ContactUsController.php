<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    //
    public function main()
    {

        return view('contact');
    }

    public function send(Request $request)
    {

        $this->validate($request, [

            'email'=>'required',
            'name'=>'required',
            'comments'=>'required',
            'subject'=>'required',

        ]);


        $name=$request->name;
        $email=$request->email;
        $subject=$request->subject;
        $comments=$request->comments;

        Mail::to("Jobatkom@gmail.com")->send(new ContactUs($name,$email,$subject,$comments));

        return back()->with('success','Message set successfully!');

//        Mail::send('email.contactmail',[
//            'name'=>$request->name,
//            'email'=>$request->email,
//            'subject'=>$request->subject,
//            'comments'=>$request->comments
//
//        ],function($mail)use($request){
//            $mail->form(env('MAIL_FORM_ADDRESS'),$request->name);
//            $mail->to("Jobatkom@gmail.com")->subject('contact us message');
//        });
//        return "Massage has been sent successfully";
    }
}
