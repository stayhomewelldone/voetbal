@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Images</h1>
            <div>
                <a href="{{ route('images.create')}}" class="btn btn-primary mb-3">Add Image</a>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Image Name</td>
                    <td>File path</td>
                    <td>Is favorite</td>
                    <td>Updated at</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($images as $image)
                    <tr>
                        <td>{{$image->id}}</td>
                        <td>{{$image->name}} </td>
                        <td>{{$image->file_path}}</td>
                        <td>{{$image->is_favorite}}</td>
                        <td>{{$image->updated_at}}</td>
                        <td>
                            <a href="{{ route('images.edit',$image->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('images.destroy', $image->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>


@endsection






