<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\User;

use Auth;


class UserController extends Controller
{
    
    public function edit($id)
    {
        $user = User::find($id) ;
        $role = request()->session()->get('role');
        return view('user-edit', compact(['user','role']));
    }
    
    public function update(User $user) 
    {
        $user->update($this->validateUser());
        
        if(request()->hasFile('photo'))
        {
            $allowedfileExtension=['pdf','jpg','png'];
            $file = request()->file('photo');
            
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            
            $chkin = in_array($extension, $allowedfileExtension);
            
            if($chkin)
            {
                $user->update(['profile_pic'=>$filename]);
             
//                request()->photo->storeAs('images', $filename);
                $file->move('images', $filename);

            }

        }
        $user->save();
        Auth::logout();
        return redirect('/login');
    }
    
    
    public function validateUser() 
    {
        return request()->validate([
           'name' => 'required',
           'email' => 'required'
        ]);
    }
   
    
}
