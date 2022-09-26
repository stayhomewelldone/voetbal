@extends('layouts.app')
@section('content')
    <h1><strong>Hallo dit zijn de foto's.</strong></h1>
    @foreach($image as $item)
        <p><strong>{{$item->name}}</strong></p>
        <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="image">

    @endforeach
@endsection
