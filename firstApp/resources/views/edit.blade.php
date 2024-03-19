@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    {{-- error variable, an array of requirement errors --}}
    {{-- {{$errors}} --}}
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        {{-- ! //required to add cross site request forgery (@csrf directive) in every form to prevent csrf attacks --}}
        @csrf
        {{-- ! using the @method directive we can do method override, use different http verbs --}}
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            {{-- ! using @error directive we can display $message of the error and error name must be specefied --}}
            @error('title')
                <p class="error-mess">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error-mess">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{$task->long_description}}</textarea>
            @error('long_description')
                <p class="error-mess">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Edit Task</button>
        </div>
    </form>
@endsection
