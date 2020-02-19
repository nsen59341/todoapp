@extends('../layouts.app2')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Task</h3></div>
                            <div class="card-body">
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
                                        {!! Form::label('category', 'Categoty') !!}
                                        {!! Form::select('category_id', array('1'=>'marketing', '2'=>'household', '3'=>'job'), $task->category_id) !!}
                                        @error('category_id')
                                        <p class="help is-danger">{{$errors->first('category_id')}}</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection

