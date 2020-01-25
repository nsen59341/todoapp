@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Contact</div>

                <div class="card-body">
                    <form align="center" method="post" action="/contact">
                        @csrf
                        <label>Email: </label>
                        <input type="email" name="email" ><br>
                        @error('email')
                        <div style="color:red;font-size:10px;">{{$message}}</div>
                        @enderror 
                        
                        @if(session('message'))
                        <div style="color:green;font-size:8px;">{{session('message')}}</div>
                        @endif
                        <br><br>
                        
                        <center><button class="btn btn-info">Send</button></center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


