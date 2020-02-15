@extends('layouts.app2')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-5 col-md-5">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">The total users: <span><b>{{ $total_users }}</b></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="javascript:void(0);" data-toggle="collapse" data-target="#users_detail">View Details</a>
                                <div class="small text-white" data-toggle="collapse" data-target="#users_detail"><i class="fas fa-angle-right"></i></div>
                                <div class="collapse" id="users_detail">
                                    <p>Admins:      {{ $admins }}</p>
                                    <p>Users:       {{ $users }}</p>
                                    <p>subscribers: {{ $subscribers }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-2"></div>
                    <div class="col-xl-5 col-md-5">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">The Total Tasks: <span><b>{{ $total_tasks }}</b></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="javascript:void(0);" data-toggle="collapse" data-target="#tasks_detail">View Details</a>
                                <div class="small text-white" data-toggle="collapse" data-target="#tasks_detail"><i class="fas fa-angle-right"></i></div>
                                <div class="collapse" id="tasks_detail">
                                    <p>Completed:        {{ $completedTasks }}</p>
                                    <p>Incomplete:       {{ $inCompleteTasks }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
@endsection
