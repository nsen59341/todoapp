<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\User;

use Illuminate\Database\Eloquent\Collection;

use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;

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
        $tasks = User::findorFail($id)->task;
        $tasks = $this->paginate($tasks,5);
        $tasks->withPath('home');
        return view('home', compact('tasks'));
        
    }
    
    public function paginate($items, $perPage = 15, $page = null, $baseUrl = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? 
                       $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), 
                           $items->count(),
                           $perPage, $page, $options);

        if ($baseUrl) {
            $lap->setPath($baseUrl);
        }

        return $lap;
    }
}
