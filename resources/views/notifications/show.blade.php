@extends('layouts.app')

@section('content')
<div class="container">
    Show all notification here
    <ul>
        @foreach($notifications AS $notification)
        <li>{{ $notification->data['amount'] }}</li>
        @endforeach
    </ul>
</div>
@endsection



