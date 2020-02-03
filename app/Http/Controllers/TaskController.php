<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;

use App\Task;
use App\User;

use Illuminate\Database\Eloquent\Collection;

use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function changeTaskStatus($var, $id)
    {
        if($var==1)
        {
            Task::where('id',$id)->update(array('status'=>2, 'completed_at'=>date('Y-m-d h:i:s')));
        }
        else if($var==2)
        {
            Task::where('id',$id)->update(array('status'=>1, 'completed_at'=>NULL));
        }
        
        return redirect('/task/show');
    }

    public function showTasks()
    {
        $key = request()->search ;
        $id = Auth::user()->id;
        $role = Auth::user()->role->name ;
        $method = request()->method();
        request()->session()->put('role', $role);
        request()->session()->flash('msg','Welcome '.auth()->user()->name);
        if( $method == "GET" ) {
            $tasks = User::findorFail($id)->task;
            $tasks = $this->paginate($tasks, 5);
            $tasks->withPath('');
        }
        else {
            $tasks = User::findorFail($id)->task->where('name','like', $key);
        }
        $param = 0 ;
        return view('task-list', compact(['tasks','method','param']));
    }

    public function showTasksbckup()
    {
        $key = request()->search ;
        $id = Auth::user()->id;
        $method = request()->method();
        request()->session()->put('role', 'admin');
        request()->session()->flash('msg','Welcome '.auth()->user()->name);
        $tasks = User::findorFail($id)->task;
        $tasks = $this->paginate($tasks,5);
        $tasks->withPath('');
        $param = 0 ;
        return view('homebck', compact(['tasks','method','param']));
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
        return view('task-list', compact(['tasks','method','param']));
    }


    public function showAddTask()
    {
        return view('task-add');
    }
    
    public function storeNewTask(TaskRequest $request)
    {
        $task = Task::create($this->validateTask());
        $task->save();
        
        return redirect('/task/show');
    }
    
    public function showEditTask($id)
    {
        $task = Task::find($id);
        return view('task-edit', compact('task'));
    }
    
    public function editTask(Task $task)
    {
        $task->update($this->validateTask());
        $task->save();
        return redirect('/task/show');
    }
    
    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return redirect('/task/show');
    }
    
    public function validateTask()
    {
        return request()->validate([
            'user_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);
    }
    
    public function showShareTask()
    {
        return view('task-share');
    }
    
    public function shareTask() 
    {
        $email = auth()->user()->email ;
        $tasks = Task::where('user_id', auth()->user()->id)->where('completed_at', NULL)->where('deleted_at', NULL)->get();
        \Mail::to($email)->send(new \App\Mail\MyMail($tasks));
        return redirect('/task/show');
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
