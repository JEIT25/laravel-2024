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
</div>
