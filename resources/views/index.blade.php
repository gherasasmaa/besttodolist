@extends('layouts.layout')

@section('content')
<!-- Description : 
    - si l'utilisateur est connecté, un lien vers la liste de ses tasks est affiché
    - sinon un lien vers login est affiché
 -->
<div class="text-center">

    <p class="pageDeGarde">Welcome to the easiest to do list organizer</p>
    @if (Route::has('login'))
        @auth
        <a href="{{ route('tasks') }}" class="btnPageDeGarde">my task list</a>
        @else
            <a href="{{ route('login') }}" class="btnPageDeGarde">login</a>
        @endauth
    @endif
</div>
@endsection