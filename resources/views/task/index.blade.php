@extends('layouts.layout')

@section('content')
@csrf
<div class="m-auto px-2">
    <h1 class="my-3">Welcome {{ $user->name }} </h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">title</th>
            <th scope="col"><span class="border-bottom border-light" id="category">category</span></th>
            <th scope="col">description</th>
            <th scope="col">show</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->category }}</td>
                <td>{{ $task->description }}</td>
                <td><a href="task/{{$task->id}}">show</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary pull-right" href='task/create'>add new task</a>


    @include('javascript.sort')
</div>
@endsection