{{--? @extends directive inherits the specified blade template --}}
@extends('layouts.app')

 {{--?   @section directive specfies where/which content to --}}
{{--?   render the html content inherited from the blade templated specified in the @extends directive --}}

@section('title')
    <div>
        <h2>This the Main Page</h2>
    </div>
    {{-- variables passed by the route are called throug inside double curly braces
{{$variable_name}} --}}

    {{-- directive @isset checks if $adminName is null --}}
@endsection

@section('content')
    <div>
        <h1>Tasks Available</h1>

@if(session()->has("success"))
    <div><p>{{session("success")}}</p></div>
@endif

        <ul>
            @forelse($tasks as $task)
                <li>{{ $task->title }} - <a href="{{ route('tasks.show', ['task' => $task->id]) }}">show task</a></li>
            @empty
                <li>There are no tasks</li>
            @endforelse
        </ul>
    </div>
@endsection

    {{-- ! MORE EXAMPLES --}}
    {{-- <div>
    <h2>Pokemon List</h2>
    <ul>
        @forelse ($pokemons as $pokemon)
            <li>Pokemon Id <b>{{ $pokemon->pokeId }}</b> -
                <a href="{{ route('pokemon.show', ['pokeId' => $pokemon->pokeId]) }}">view
                </a>
            </li>
        @empty
            <h2>No Pokemons Available</h2>
        @endforelse
    </ul>
</div> --}}
