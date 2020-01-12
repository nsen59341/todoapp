<div align="center"><u><h3>Task list shared by <i>{{ $user }}</i></h3></u></div>

<div class="table-responsive">
    <table class="table" cellspacing="60">
      <thead>
        <tr>
          <th align="center">Name</th>
          <th align="center">Description</th>
        </tr>
      </thead>
      <tbody>
         @if(!($tasks->isEmpty()))
            @foreach( $tasks AS $task )
                <tr>
                 <td align="center">{{ $task->name }}</td>
                 <td align="center">{{ $task->description }}</td>
               </tr>
           @endforeach
        @else
        <tr>
            
            <td></td>
            <td align="right"><span class="no-task">No tasks</span></td>
            <td></td>
            <td></td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>
