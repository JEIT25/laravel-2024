@if (session()->has('success'))
    <div>
        <p>{{ session('success') }}</p>
    </div>
@endif
<div>
    <h2>{{ $task->title }}</h2>
    <ul>
        <li>{{ $task->description }}</li>
        @if($task->long_description)
            <li>{{ $task->long_description }}</li>
        @endforelse
    </ul>
    <p><b>Created At: {{$task->created_at}}</p>
    <p><b>Updated At: {{$task->updated_at}}</p>
    <form action="{{route('tasks.destroy',['task' => $task->id])}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
    </form>
</div>
