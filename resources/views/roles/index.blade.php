@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('roles.create')}}">New Role</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        @foreach ($roles as $key => $role )
        <tbody>
            {{-- <td>{{$key+1}}</td> --}}
            <td>{{$loop->iteration}}</td>
            <td>{{$role->name}}</td>
            {{-- @dd($role->permissions) --}}
            @foreach ($role->permissions as $permission)
            <td>
                {{$permission->name}}
            </td>
            @endforeach
            <td>
                <a class="btn btn-primary" href="{{route('roles.edit', $role->id)}}">Edit</a>
            </td>
            <td>
                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
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

