<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

use App\Notifications\paymentReceived;

class PaymentController extends Controller
{
    public function create() 
    {
        return view('payments.create');
    }
    
    public function store() 
    {
        Notification::send(request()->user(), new paymentReceived(600));
        
        return redirect('/payment/create');
    }
}
