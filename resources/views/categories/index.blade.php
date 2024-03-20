@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            <a href="{{route('categories.create')}}">New Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                {{-- @dd($category->img); --}}
                                <img src="{{asset('uploadedImages/'.$category->img)}}" alt="" width="500px">
                            </td>
                            <td>{{$category->status}}</td>
                            <td>
                                <a href="{{route('categories.edit',$category->id)}}">Edit</a>

                            </td>
                            <td>
                                <form action="{{route('categories.delete',$category->id)}}" method="POST">
                                 @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
