@extends('layouts.app')
@section('content')
   @auth()
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>

        <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
            <!-- Add CSRF Token -->
            @csrf
            <div class="form-group">
                <label>Image Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <input type="file" name="file" required>
            </div>
            <button type="submit">Submit</button>
        </form>

    </div>
   @endauth
   @guest()
   <h1>You are not authorized</h1>
   @endguest
@endsection
