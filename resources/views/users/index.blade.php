@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('users.create')}}">New User</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        @foreach ($users as $user )
        <tbody>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            @foreach ($user->roles as $role )
            <td>{{$role->name}}</td>
            @endforeach
            <td>
                <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a>
            </td>
            <td>
                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-info">Delete</button>
                </form>
            </td>
        </tbody>
        @endforeach
    </table>

</div>
@endsection
