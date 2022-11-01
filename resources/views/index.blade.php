@extends('layouts.app')
@section('content')
    <h1><strong>Hi these are the pictures.</strong></h1>
    <form method="GET" action="#">
 <label for="usernames">Choose a editor </label>

    <select name="usernames" id="usernames">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
        <input type="submit" value="search" >
    </form>
    <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
     <form method="GET" action="#">
       <input type="text" name="search" placeholder="Find a soccer player"
       class="bg-transparent placeholder-black font-semibold text-sm"
       value="{{request('search')}}">
     </form>
    </div>

    @foreach($image as $item)
        @if($item->status == "1"  )
            @if($item->user) <p>Posted by:<strong> {{$item->user->name}}</strong>  </p>@endif

            <p>Soccer player: <strong>{{$item->name}}</strong></p>
            <p>Position: <strong>{{$item->position}}</strong></p>


            <img src="{{ asset('storage/image/'.$item->file_path) }}" alt="{{$item->name}}" width="500" height="350">
            <hr style="border: 3px solid #4B0008; width: 33%;;">

        @endif
    @endforeach
@endsection
