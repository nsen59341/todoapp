@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bottom-top-margin">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!empty(request()->session()->get('name_err_message')))
                    <center><font color="red">{{ request()->session()->get('name_err_message') }}</font></center>
                    @endif
                    <div class="text-left">
                        <form method="post" action="{{ url('/home') }}">
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
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Description</th>
                              <th scope="col">Completed?</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php $i = 0 ; ?>
                             @if(!($tasks->isEmpty()))
                                @foreach( $tasks AS $task )
                                <?php $i++; ?>
                                    <tr>
                                     <th scope="row">{{ $i }}</th>
                                     <td>{{ $task->name }}</td>
                                     <td>{{ $task->description }}</td>
                                     <td>
                                         @if($task->status == 1)
                                         <a class="mark-completed" href="{{url('/statusChange/1/'.$task->id)}}"><span class="glyphicon glyphicon-ok"></span></a> &nbsp
                                         @elseif($task->status == 2)
                                         <a class="mark-incompleted" href="{{url('/statusChange/2/'.$task->id)}}"><span class="glyphicon glyphicon-remove"></span></a>
                                         @endif
                                     </td>
                                     <td>
                                         <a class="glyphicon glyphicon-trash delete" href="{{url('/task/delete/'.$task->id)}}"></a>
                                         <a class="glyphicon glyphicon-edit edit" href="{{url('/task/edit/'.$task->id)}}"></a>
                                     </td>
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
    </div>
</div>
<script>

    $(".add-task").click(function() {
       location.href = "/task/add"; 
    });
    
     $(".share-task").click(function() {
       location.href = "/task/share"; 
    });

    $("#category").change(function() {
       var key = $(this).val();
       location.href = "/home/"+key ; 
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
