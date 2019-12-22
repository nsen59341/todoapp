<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    public function changeTaskStatus($var, $id)
    {
        if($var==1)
        {
            Task::where('id',$id)->update(array('status'=>2));
        }
        else if($var==2)
        {
            Task::where('id',$id)->update(array('status'=>1));
        }
        
        return redirect('/home');
    }
    
    public function showAddTask()
    {
        return view('task-add');
    }
    
    public function storeNewTask()
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
            'description' => 'nullable'
        ]);
    }
    
    
}
