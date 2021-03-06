@extends('layouts.app2')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <p style="background-color:#2d995b;">
                @if( \Illuminate\Support\Facades\Session::get('task_added') )
                    {{ \Illuminate\Support\Facades\Session::get('task_added') }}
                @endif
                @if( \Illuminate\Support\Facades\Session::get('task_updated') )
                    {{ \Illuminate\Support\Facades\Session::get('task_updated') }}
                @endif
                @if( \Illuminate\Support\Facades\Session::get('task_shared') )
                    {{ \Illuminate\Support\Facades\Session::get('task_shared') }}
                @endif
                </p>
                @if( \Illuminate\Support\Facades\Session::get('task_deleted') )
                    <p style="background-color:#ac2925; color: #d4edda;">{{ \Illuminate\Support\Facades\Session::get('task_deleted') }}</p>
                @endif
                <h1 class="mt-4">Tasks</h1>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Task List</div>
                    <div class="card-body">
                        <div class="text-left">
                            <form method="post" action="{{ url('/task/show') }}">
                                @csrf
                                <input type="text" name="search" placeholder="search">
                                <button style="cursor:pointer;" title="search" class="glyphicon glyphicon-search"></button>
                            </form>
                            <form align="center">
                                <select name="category" id="category">
                                    <option value="0">All Tasks</option>
                                    <option value="1">Completed Tasks</option>
                                    <option value="2">Pending Tasks</option>
                                </select>
                            </form>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-info btn-sm share-task" title="share task list">
                                <span class="glyphicon glyphicon-share"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm add-task" title="add a new task">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Category</th>
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
                                            <td>{{ Str::limit($task->description, 16) }}</td>
                                            <td>{{ $task->category->name }}</td>
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


    <script>

        $(".add-task").click(function() {
            location.href = "/task/add";
        });

        $(".share-task").click(function() {
            location.href = "/task/share";
        });

        $("#category").change(function() {
            var key = $(this).val();
            location.href = "/task/show/"+key ;
        });

        $(document).ready(function() {
            if( {{$param}} )
            {
                var key = {{$param}};
                $("#category option[value="+key+"]").attr('selected',true);
            }

        });


    </script>

@endsection
