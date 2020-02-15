@extends('../layouts.app2')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Update User Info</h3></div>
                            <div class="card-body">
                                {!! Form::open(['method'=>'PUT', 'url'=>url('/users/'.$user->id), 'files'=>true]) !!}
                                @csrf
                                <div class="form-group col-sm-12">
                                    <center><img src="{{ url( 'images/' . $user->profile_pic ) }}" id="prof_pic" height="50px" width="50px"><br>
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

                                <div class="form-group col-sm-12">
                                    {!! Form::label('role', 'Role') !!}
                                    {!! Form::select('role_id', array('2'=>'User', '3'=>'Subscriber'), $user->role_id) !!}
                                    @error('role_id')
                                    <p class="help is-danger">{{$errors->first('role_id')}}</p>
                                    @enderror
                                </div>

                                <div align="center"><button type="submit" class="btn btn-info" id="updtBtn">Update</button></div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection


