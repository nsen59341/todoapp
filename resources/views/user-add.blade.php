@extends('../layouts.app2')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add User</h3></div>
                            <div class="card-body">
                                {!! Form::open(['method'=>'post', 'url'=>'user/add-new', 'files'=>true]) !!}
                                @csrf
                                <div class="form-group col-sm-12">
                                    {!! Form::label('upload', 'Upload Photo') !!}
                                    {!! Form::file('photo') !!}
                                    @error('profile_pic')
                                    <p class="help is-danger">{{$errors->first('profile_pic')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    {!! Form::label('name', 'Name') !!}
                                    {!! Form::text('name', old('name'), ['class'=>'form-control', 'id'=>'name', 'required'=>true, 'placeholder'=>'Name']) !!}
                                    @error('name')
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::email('email', old('email'), ['class'=>'form-control', 'id'=>'email', 'required'=>true, 'placeholder'=>'Email']) !!}
                                    @error('email')
                                    <p class="help is-danger">{{$errors->first('email')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    {!! Form::label('password', 'Password') !!}
                                    {!! Form::password('password', old('password'), ['id'=>'password', 'class'=>'form-control', 'required'=>true, 'placeholder'=>'Password', "autocomplete" => "off"]) !!}
                                    @error('password')
                                    <p class="help is-danger">{{$errors->first('password')}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    {!! Form::label('role', 'Role') !!}
                                    {!! Form::select('role_id', array('2'=>'User', '3'=>'Subscriber')) !!}
                                    @error('role_id')
                                    <p class="help is-danger">{{$errors->first('role_id')}}</p>
                                    @enderror
                                </div>

                                <div align="center"><button type="submit" class="btn btn-info" id="addBtn">Add</button></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection


