@extends('../layouts.app2')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Share Task</h3></div>
                            <div class="card-body">
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
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection

