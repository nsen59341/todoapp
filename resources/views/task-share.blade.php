@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Add New Task</h1></center>
    <form action="{{url('/send-mail')}}" >
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group col-sm-12">
            <label for="Name">Email</label>
            <input type="email" class="form-control" required name="email" id="email" placeholder="Email ID" >
            @error('email')
            <p class="help is-danger">{{$errors->first('email')}}</p>
            @enderror
        </div>
        <div align="center"><button type="submit" class="btn btn-info" id="sendBtn">SEND</button></div>
    </form>
</div>

@endsection

