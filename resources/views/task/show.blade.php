@extends('layouts.layout')

@section('content')
<div class="m-auto px-2">
    <h1 class="border-bottom border-dark">{{ $task->title }} - <span>{{ $task->category }}</span></h1>
    <p>{{ $task->description }}</p>
    <a href="/task" class="btn btn-secondary">go back</a>
    <a href="/task/{{ $task->id }}/edit" class="btn btn-warning">modify</a>
    <a href="/task/{{ $task->id }}/delete" class="btn btn-danger">delete</a>
</div>
@endsection