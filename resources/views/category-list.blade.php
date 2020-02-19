@extends('layouts.app2')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <p style="background-color:#2d995b;">
                    @if( \Illuminate\Support\Facades\Session::get('category_added') )
                        {{ \Illuminate\Support\Facades\Session::get('category_added') }}
                    @endif
                </p>
                @if( \Illuminate\Support\Facades\Session::get('category_deleted') )
                    <p style="background-color:#ac2925; color: #d4edda;">{{ \Illuminate\Support\Facades\Session::get('category_deleted') }}</p>
                @endif
                <h1 class="mt-4">Categories</h1>
                <div class="card mb-4">
                    <div class="card-header">Categories
                        <button type="button" class="btn btn-danger btn-sm add-category text-right" title="add a new categoty">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ; ?>
                                @if(!($categories->isEmpty()))
                                    @foreach( $categories AS $category )
                                        <?php $i++; ?>
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <form method="post" action="{{ route('category.destroy',$category->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                <button class="glyphicon glyphicon-trash delete" ></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><span class="no-task">No Category</span></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <script>

            $(".add-category").click(function() {
                location.href = "category/create";
            });


        </script>

@endsection
