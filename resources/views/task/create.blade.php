@extends('layouts.layout')

@section('content')

<div class="m-auto px-2">
    <h1 class="px-2">new task</h1>

    <form class="form-group" action="{{ route('save') }}" method='post'>
    @csrf

        <input class="form-control @error('title') is-invalid @enderror my-2 obligatoire" type="text" name="title" id="title" placeholder="title" value="{{ old('title') }}">
        @error('title') <p>what is your task title ?</p> @enderror
        <input class="form-control" type="text" name="category" id="category" placeholder="category" value="{{ old('category') }}">
    
        <textarea class=" my-2 form-control" name="description" id="description" cols="30" rows="10" placeholder="task description...">{{ old('description') }}</textarea><br>

        <button class="btn btn-success" id="addTask">add Task</button>
        <a href="{{ route('tasks') }}" class="btn btn-secondary">go back</a>
    </form>

</div>

@endsection