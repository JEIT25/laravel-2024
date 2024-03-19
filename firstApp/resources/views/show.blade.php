@if (session()->has('success'))
    <div>
        <p>{{ session('success') }}</p>
    </div>
@endif
<div>
    <h2>{{ $task->title }}</h2>
    <ul>
        <li>{{ $task->description }}</li>
        @if ($task->long_description)
            <li>{{ $task->long_description }}</li>
        @endforelse
    </ul>
    <p><b>Created At: {{ $task->created_at }}</p>
    <p><b>Updated At: {{ $task->updated_at }}</p>

    <form action="{{ route('tasks.edit', ['task' => $task->id]) }}">
        @csrf
        <button type="submit">Edit</button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <form action="{{ route('tasks.toggleCompleted', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        @if ($task->completed)
            <button type="submit">Mark as not completed</button>
        @else
            <button type="submit">Mark as completed</button>
        @endif
        </button>
    </form>


</div>
