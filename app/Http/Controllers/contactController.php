<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;

class contactController extends Controller
{
    public function show() 
    {
        return view('contact');
    }
    
    public function store() 
    {
        request()->validate([
           'email'=> 'required|email' 
        ]);
        
//        Mail::raw('It works!', function($message) {
//           $message->to(request('email'))->subject('Test Mail'); 
//        });
        
        Mail::to(request('email'))->send(new ContactMe('tshirt'));
        
        return redirect('/contact')->with('message', 'Email Sent!');
    }
    
}

