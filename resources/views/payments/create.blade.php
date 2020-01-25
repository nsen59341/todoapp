@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment</div>

                <div class="card-body">
                    <form align="center" method="post" action="/payment">
                        @csrf
                         
                        <center><button class="btn btn-info">make payment</button></center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



