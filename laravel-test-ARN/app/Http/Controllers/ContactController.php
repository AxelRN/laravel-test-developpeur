<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
use voku\helper\AntiXSS;

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

        $antiXss = new AntiXSS();

        $mailData = [
            'title' => 'Mail from laravel-test-ARN',
            'name' => ''.$antiXss->xss_clean($request->name),
            'email' => ''.$antiXss->xss_clean($request->email),
            'phone' => ''.$antiXss->xss_clean($request->phone),
            'body' => ''.$antiXss->xss_clean($request->message),
        ];

        Mail::to('robertnaudinaxel@gmail.com')->send(new TestMail($mailData));

        return redirect()->route('contact.success');

    }

    public function success(){

        return view('contact_success');
    }
}
