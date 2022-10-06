@extends('layouts.app')
@section('content')
    <h1><strong>Hallo dit zijn de foto's.</strong></h1>

    @foreach($image as $item)
        @if($item->user) <h2>Posted by: {{$item->user->name}}</h2>@endif

        <p><strong>{{$item->name}}</strong></p>

        <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="{{$item->name}}">
    @endforeach
@endsection
