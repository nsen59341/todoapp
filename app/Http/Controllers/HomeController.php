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
        $admins = User::where('role_id',1)->count();
        $users = User::where('role_id',2)->count();
        $subscribers = User::where('role_id',3)->count();
        $total_users = ($admins+$users+$subscribers);

        $inCompleteTasks = Task::where('status',1)->count();
        $completedTasks = Task::where('status',2)->count();
        $total_tasks = ($inCompleteTasks+$completedTasks);

        return view('home', compact(['admins','users','subscribers','total_users','inCompleteTasks','completedTasks','total_tasks']));
        
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
