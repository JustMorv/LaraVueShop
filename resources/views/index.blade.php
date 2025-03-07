@extends('layouts.auth')

@section('content')

    @auth()
        <form method="POST" action="{{route('logout')}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="выйти">
        </form>
    @endauth
@endsection
