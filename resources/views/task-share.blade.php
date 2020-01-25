@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Add New Task</h1></center>
    {!! Form::open(['method'=>'get', 'url'=>url('/send-mail')]) !!}
        @csrf
        {!! Form::hidden('user_id', Auth::user()->id ) !!}
        <div class="form-group col-sm-12">
            <label for="Name">Email</label>
            {!! Form::email('email', null, ['class'=>'form-control', 'id'=>'email', 'required'=>true, 'placeholder'=>'Email']) !!}
            @error('email')
            <p class="help is-danger">{{$errors->first('email')}}</p>
            @enderror
        </div>
        <div align="center">
            {!! Form::submit('SEND',['class'=>'btn btn-info', 'id'=>'sendBtn']) !!}
        </div>
    {!! Form::close() !!}
</div>

@endsection

