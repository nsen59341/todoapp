@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Edit Task</h1></center>
    <form method="post" enctype="multipart/form-data" action="{{url('/user/'.$user->id)}}">
        @csrf
        @method('put')
        <div class="form-group col-sm-12">
            <center><img src="{{ url( 'images/' . $user->profile_pic ) }}" id="prof_pic" height="50px" width="50px"></center>
            <label for="description">Upload Profile Picture:</label>
            <input type="file" name="photo" >
            @error('profile_pic')
            <p class="help is-danger">{{$errors->first('profile_pic')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label for="Name">Name</label>
            <input type="name" class="form-control" required name="name" id="name" placeholder="Name" value="{{$user->name}}">
            @error('name')
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label for="description">Email:</label>
            <input type="email" name="email" placeholder="Email" required value="{{ $user->email }}">
            @error('email')
            <p class="help is-danger">{{$errors->first('email')}}</p>
            @enderror
        </div>
        
        <div align="center"><button type="submit" class="btn btn-info" id="addBtn">Update</button></div>
    </form>
</div>

@endsection


