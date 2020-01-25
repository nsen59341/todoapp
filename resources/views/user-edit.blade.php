@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Edit Task</h1></center>
    {!! Form::model($user,['method'=>'PUT', 'action'=>['UserController@update', $user->id], 'files'=>true]) !!}
    <!--{!! Form::open(['method'=>'PUT', 'url'=>url('/user/'.$user->id), 'files'=>true]) !!}-->
    @csrf
        <div class="form-group col-sm-12">
            <center><img src="{{ url( 'images/' . $user->profile_pic ) }}" id="prof_pic" height="50px" width="50px"><br>
            <span>As {{$role}}</span>
            </center>
            <br>
            {!! Form::label('upload', 'Upload Photo') !!}
            {!! Form::file('photo') !!}
            @error('profile_pic')
            <p class="help is-danger">{{$errors->first('profile_pic')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $user->name, ['class'=>'form-control', 'id'=>'name', 'required'=>true, 'placeholder'=>'Name']) !!}
            @error('name')
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', $user->email, ['class'=>'form-control', 'id'=>'email', 'required'=>true, 'placeholder'=>'Email']) !!}
            @error('email')
            <p class="help is-danger">{{$errors->first('email')}}</p>
            @enderror
        </div>
        
        <div align="center"><button type="submit" class="btn btn-info" id="addBtn">Update</button></div>
    </form>
</div>

@endsection


