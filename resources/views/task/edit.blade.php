@extends('layouts.layout')

@section('content')

<div class="m-auto px-2">
    <h1 class="px-2">new task</h1>

    <form class="form-group" action="{{ route('update', $task->id) }}" method='post'>
    @csrf
    @method('PATCH')

        <input class="form-control @error('title') is-invalid @enderror my-2 obligatoire" type="text" name="title" id="title" placeholder="title" value="{{ old('title') ?? $task->title }}">
        @error('title') <p>what is your task title ?</p> @enderror
        <input class="form-control" type="text" name="category" id="category" placeholder="category" value="{{ old('category') ?? $task->category }}">
    
        <textarea class=" my-2 form-control" name="description" id="description" cols="30" rows="10" placeholder="task description...">{{ old('description') ?? $task->description }}</textarea><br>

        <button class="btn btn-success" id="modifyTask">modify Task</button>
        <a href="{{ route('tasks') }}" class="btn btn-secondary">cancel</a>
    </form>

</div>

@endsection