@extends('layouts.app')
@section('content')
    <h1><strong>Hi these are the pictures.</strong></h1>
    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
     <form method="GET" action="#">
       <input type="text" name="search" placeholder="Find something"
       class="bg-transparent placeholder-black font-semibold text-sm"
       value="{{request('search')}}">
     </form>
    </div>

    @foreach($image as $item)
        @if($item->status == "1"  )
            @if($item->user) <h2>Posted by: {{$item->user->name}}</h2>@endif

            <p>Soccer player: <strong>{{$item->name}}</strong></p>
            <p>Position: <strong>{{$item->position}}</strong></p>


            <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="{{$item->name}}" width="500" height="350">
        @endif
    @endforeach
@endsection
