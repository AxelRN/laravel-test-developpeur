<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class ContactController extends Controller
{
    public function index(){

        return view('contact');
    }

    public function submit(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc',
            'message' => 'required',
        ]);

        $mailData = [
            'title' => 'Mail from laravel-test-ARN',
            'name' => ''.$request->name,
            'email' => ''.$request->email,
            'phone' => ''.$request->phone,
            'body' => ''.$request->message,
        ];

        Mail::to('robertnaudinaxel@gmail.com')->send(new TestMail($mailData));

        return view('contact_success');

    }
}
