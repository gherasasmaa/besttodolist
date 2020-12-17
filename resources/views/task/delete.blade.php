@extends('layouts.layout')

@section('content')

<div class="m-auto px-2">
    <h1 class="border-bottom border-dark"> Are you sure you want to delete this task ? </h1> 
    <h2>{{ $task->title }} - <span>{{ $task->category }}</span></h2>
    <p>{{ $task->description }}</p>

    <form class="form-group" action="/task/{{ $task->id }}" method='post'>
    @csrf
    @method('DELETE')
        <button class="btn btn-danger" id="deleteTask">delete Task</button>
        <a href="/task/{{ $task->id }}" class="btn btn-secondary">cancel</a>
    </form>

</div>

@endsection