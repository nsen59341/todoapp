@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Add New Task</h1></center>
    <form action="{{url('/task')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group col-sm-12">
            <label for="Name">Name</label>
            <input type="text" class="form-control" required name="name" id="name" placeholder="Name" value="{{old('name')}}">
            @error('name')
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" required id="description" placeholder="Add Description...">{{old('description')}}</textarea>
            @error('description')
            <p class="help is-danger">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div align="center"><button type="submit" class="btn btn-info" id="addBtn">ADD</button></div>
    </form>
</div>

@endsection
