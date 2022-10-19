@extends('layouts.app')
@section('content')
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>
    @if($posts->isNotEmpty())
        <p>{{ $posts->name }}</p>
{{--        @foreach ($posts as $post)--}}

{{--                <p>{{ $post->name }}</p>--}}
{{--                <img src="{{ $post->id }}">--}}

{{--        @endforeach--}}
    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
@endsection
