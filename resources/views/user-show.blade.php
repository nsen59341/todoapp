@extends('layouts.app2')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Users</h1>


                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Users List</div>
                    <div class="card-body">
{{--                        <div class="text-left">--}}
{{--                            <form method="post" action="{{ url('/task/show') }}">--}}
{{--                                @csrf--}}
{{--                                <input type="text" name="search" placeholder="search">--}}
{{--                                <button style="cursor:pointer;" title="search" class="glyphicon glyphicon-search"></button>--}}
{{--                            </form>--}}
{{--                            <form align="center">--}}
{{--                                <select name="category" id="category">--}}
{{--                                    <option value="0">All Tasks</option>--}}
{{--                                    <option value="1">Completed Tasks</option>--}}
{{--                                    <option value="2">Pending Tasks</option>--}}
{{--                                </select>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                        @if( Auth::user()->role->id == 1 )
                        <div class="text-right">
                            <button type="button" class="btn btn-danger btn-sm add-user" title="add a new user">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>&nbsp</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    @if( Auth::user()->role->id == 1 )
                                    <th>Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @if(!($users->isEmpty()))
                                    @foreach( $users AS $user )
                                        <tr>
                                            <td><img src="{{ url('images/'.$user->profile_pic) }}" height="40px" width="40px"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            @if( Auth::user()->role->id == 1 )
                                            <td>
                                                <a class="glyphicon glyphicon-trash delete" href="{{url('/users/delete/'.$user->id)}}"></a>
                                                <a class="glyphicon glyphicon-edit edit" href="{{url('/users/edit/'.$user->id)}}"></a>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><span class="no-task">No users</span></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        @if( $method == "GET" )
                            {{ $users->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </main>


        <script>

            $(".add-user").click(function() {
                location.href = "/user/add";
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
