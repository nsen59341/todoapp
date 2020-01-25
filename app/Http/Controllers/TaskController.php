<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TaskRequest;

use App\Task;
use App\User;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('checkAge');
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
        
        return redirect('/home');
    }
    
    public function showAddTask()
    {
        return view('task-add');
    }
    
    public function storeNewTask(TaskRequest $request)
    {
        $task = Task::create($this->validateTask());
        $task->save();
        
        return redirect('/home');
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
        return redirect('/home');
    }
    
    public function deleteTask($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return redirect('/home');
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
        return redirect('/home');
    }
    
}
