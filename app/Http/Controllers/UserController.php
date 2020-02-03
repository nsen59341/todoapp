<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\UserRequest;

use App\User;

use Auth;

use Illuminate\Database\Eloquent\Collection;

use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;


class UserController extends Controller
{
    
    public function edit($id)
    {
        $user = User::find($id) ;
        $role = request()->session()->get('role');
        return view('profile-edit', compact(['user','role']));
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

    public function showUsers()
    {
        $method = request()->method();
        if( $method == "GET" ) {
            $users = User::get();
            $users = $this->paginate($users, 10);
            $users->withPath('');
        }
        else {
            $users = User::get()->where('name','like', $key);
        }
        $param = 0 ;
        return view('user-show', compact(['users','method','param']));
    }

    public function addUsers()
    {
        return view('user-add');
    }

    public function addNewUser(UserRequest $request)
    {
        if( $request->password == '' )
        {
            $input = $request->except('password');
        }
        else{
            $input = $input = $request->all();
            $input['password'] = bcrypt($request->password);
        }


        if($request->file('photo'))
        {
            $allowedfileExtensions = ['pdf','jpg','png'];
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $chkin = in_array($extension, $allowedfileExtensions);

            if( $chkin )
            {
//                User::update(['profile_pic'=>$filename]);
                $input['profile_pic'] = $filename ;
                $file->move('images', $filename);
            }

        }


        User::create($input);

        return redirect('/user/show');

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
