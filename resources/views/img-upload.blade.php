@extends('layouts.app3')

@section('uploadstyle')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">

@endsection

@section('content')

        {!! Form::open(['method'=>'post', 'url'=> url('upload'), 'enctype'=>'multipart/form-data', 'class'=>'dropzone', 'id'=>"dropzone"]) !!}

        {!! Form::close() !!}

@endsection

@section('uploadscript')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

@endsection