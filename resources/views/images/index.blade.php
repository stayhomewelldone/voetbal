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
                @foreach($image as $images)
                    <tr>
                        <td>{{$images->id}}</td>
                        <td>{{$images->name}} </td>
                        <td>{{$images->file_path}}</td>
                        <td>{{$images->is_favorite}}</td>
                        <td>{{$images->updated_at}}</td>
                        <td><td>
                            <input data-id="{{$images->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $images->status ? 'checked' : '' }}>
                        </td></td>
                        <td>
                            <a href="{{ route('images.edit',$images->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('images.destroy', $images->id)}}" method="post">
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







