<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $tasks = User::find($id)->task;
        return view('home', compact('tasks'));
    }
}
