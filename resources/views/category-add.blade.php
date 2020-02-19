@extends('../layouts.app2')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Category</h3></div>
                            <div class="card-body">
                                {!! Form::open(['method'=>'post', 'action'=>'CategoryController@store']) !!}
                                @csrf
                                <div class="form-group col-sm-12">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', old('name'), ['class'=>'form-control', 'id'=>'name', 'required'=>true, 'placeholder'=>'Name']) !!}
                                    @error('name')
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                    @enderror
                                </div>
                                <div align="center">
                                    {!! Form::submit('ADD', ['class'=>'btn btn-danger', 'id'=>'addBtn']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection
