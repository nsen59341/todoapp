@extends('layouts.app2')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Completed?</th>
                                    <th>Action</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ; ?>
                                @if(!($tasks->isEmpty()))
                                    @foreach( $tasks AS $task )
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $task->name }}</td>
                                            <td>{{ $task->description }}</td>
                                            <td>@if($task->status == 1)
                                                    <a class="mark-completed" href="{{url('/statusChange/1/'.$task->id)}}"><span class="glyphicon glyphicon-ok"></span></a> &nbsp
                                                @elseif($task->status == 2)
                                                    <a class="mark-incompleted" href="{{url('/statusChange/2/'.$task->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="glyphicon glyphicon-trash delete" href="{{url('/task/delete/'.$task->id)}}"></a>
                                                <a class="glyphicon glyphicon-edit edit" href="{{url('/task/edit/'.$task->id)}}"></a>
                                            </td>
                                            <td>{{ $task->created_at }}</td>
                                            <td>{{ $task->completed_at ? $task->completed_at : '--' }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><span class="no-task">No tasks</span></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        @if( $method == "GET" )
                            {{ $tasks->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website {{ date('Y') }}</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
