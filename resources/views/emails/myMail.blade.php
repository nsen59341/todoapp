<div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
         @if(!($tasks->isEmpty()))
            @foreach( $tasks AS $task )
                <tr>
                 <th scope="row">1</th>
                 <td>{{ $task->name }}</td>
                 <td>{{ $task->description }}</td>
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
