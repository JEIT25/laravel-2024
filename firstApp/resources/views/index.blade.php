<div>
    <h2>This the Main Page</h2>
</div>
{{-- variables passed by the route are called throug inside double curly braces
{{$variable_name}} --}}

{{-- directive @isset checks if $adminName is null --}}
<div>
    <h1>Tasks Available</h1>
    <ul>
        @forelse($tasks as $task)
            <li>{{ $task->title }} - <a href="{{ route('task.show', ['id' => $task->id]) }}">show task</a></li>
        @empty
            <li>There are no tasks</li>
        @endforelse
    </ul>
</div>
