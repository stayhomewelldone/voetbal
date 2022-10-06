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
            <form method="post" action="{{ route('images.update', $image->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="stock_name">Image Name:*</label>
                    <input type="text" class="form-control" name="name" value="{{ $image->name }}" />
                </div>

                <div class="form-group">
                    <label for="ticket">Image Ticket:*</label>
                    <input type="text" class="form-control" name="ticket" value="{{ $image->ticket }}" />
                </div>

                <div class="form-group">
                    <label for="value">Image Value:</label>
                    <input type="text" class="form-control" name="value" value="{{ $image->value }}" />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


@endsection

