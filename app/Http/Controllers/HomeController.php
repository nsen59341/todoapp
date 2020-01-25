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
        $this->middleware(['auth','IsAdmin']);
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $key = request()->search ;
        $id = Auth::user()->id;
        $method = request()->method();
        request()->session()->put('role', 'admin');
        request()->session()->flash('msg','Welcome '.auth()->user()->name);
        if( $method == 'GET' )
        {        
            $tasks = User::findorFail($id)->task;
            $tasks = $this->paginate($tasks,5);
            $tasks->withPath('');
            
        }
        else {
            $tasks = User::findorFail($id)->task->where('name', 'like', $key);      
        }
        $param = 0 ;
        return view('home', compact(['tasks','method','param']));
        
    }
    
    public function categorigeTask($key) 
    {
        $id = auth()->user()->id ;
        $method = request()->method() ;
        if( !empty($key) )
        {
            $tasks = User::findorFail($id)->task->where('status', $key);
        }
        else {
            $tasks = User::findorFail($id)->task;
        }
        $tasks = $this->paginate($tasks,5);
        $tasks->withPath('');
        $param = $key;
        return view('home', compact(['tasks','method','param']));
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
