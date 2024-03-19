@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    {{-- error variable, an array of requirement errors --}}
    {{-- {{$errors}} --}}
    <form action="{{ route('tasks.store') }}" method="POST">
        {{-- ! //required to add cross site request forgery (@csrf directive) in every form to prevent csrf attacks --}}
        @csrf
        <div>
            <label for="title">Title</label>
            {{--! old() method used to not delete a valid input when form is submitted --}}
            {{--! only works in POST methods and method overrides --}}
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            {{-- ! using @error directive we can display $message of the error and error name must be specefied --}}
            @error('title')
                <p class="error-mess">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-mess">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-mess">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <input type="submit" name="submit">
        </div>
    </form>
@endsection
