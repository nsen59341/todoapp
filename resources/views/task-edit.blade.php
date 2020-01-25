@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Edit Task</h1></center>
    {!! Form::model($task, ['method'=>'put', 'action'=>['TaskController@editTask', $task->id]]) !!}
    @csrf
        {!! Form::hidden('user_id', Auth::user()->id ) !!}
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', $task->name, ['class'=>'form-control', 'id'=>'name', 'required'=>true, 'placeholder'=>'Name' ]) !!}
            @error('name')
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $task->description, ['class'=>'form-control', 'id'=>'description', 'required'=>true, 'placeholder'=>'Add Description...', 'rows'=>6]) !!}
            @error('description')
            <p class="help is-danger">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div align="center">
            {!! Form::submit('Update', ['class'=>'btn btn-info', 'id'=>'addBtn']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection

