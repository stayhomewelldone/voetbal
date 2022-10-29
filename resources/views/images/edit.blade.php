@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Editing Images</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('images.update', $image->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="stock_name">Soccer player Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $image->name }}" required />
                    <label for="stock_name">Position:</label>
                    <input type="text" class="form-control" name="position" value="{{ $image->position }}" required />
                </div>
                <div class="form-group">
                    <label for="stock_name">Image file:</label>
                    <input type="file" class="form-control" name="file" v/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


@endsection

