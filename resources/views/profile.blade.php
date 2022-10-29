@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">User</h1>

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>User ID</td>
                    <td>Name</td>
                    <td>Email</td>

                </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}} </td>
                        <td>
                            <a href="{{ route('edit',$users->id)}}" class="btn btn-primary">Edit</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>


@endsection

