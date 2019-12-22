@extends('../layouts.app')

@section('content')

<div class="container bottom-top-margin">
    <center><h1>Edit Task</h1></center>
    <form method="post" action="{{url('/task/'.$task->id)}}">
        @csrf
        @method('put')
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="form-group col-sm-12">
            <label for="Name">Name</label>
            <input type="name" class="form-control" required name="name" id="name" placeholder="Name" value="{{$task->name}}">
            @error('name')
            <p class="help is-danger">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group col-sm-12">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" placeholder="Add Description...">{{$task->description}}</textarea>
            @error('description')
            <p class="help is-danger">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div align="center"><button type="submit" class="btn btn-info" id="addBtn">Update</button></div>
    </form>
</div>

@endsection

