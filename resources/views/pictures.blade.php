@extends('layouts.app')
@section('content')
    <h1><strong>Hi these are the pictures.</strong></h1>

    @foreach($image as $item)
        @if($item->status == "1"  )
            @if($item->user) <h2>Posted by: {{$item->user->name}}</h2>@endif

            <p><strong>{{$item->name}}</strong></p>

            <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="{{$item->name}}" width="500" height="350">
        @endif
    @endforeach
@endsection
