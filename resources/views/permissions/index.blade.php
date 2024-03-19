@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('permissions.create')}}">New Permission</a>
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
        @foreach ($permission as $key => $permission )
        <tbody>
            {{-- <td>{{$key+1}}</td> --}}
            <td>{{$loop->iteration}}</td>
            <td>{{$permission->name}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('permissions.edit', $permission->id)}}">Edit</a>
            </td>
            <td>
                <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
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
