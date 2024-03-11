@extends("layouts.app")

@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Category</h1>
    <a href="{{route('categories.create')}}">New Create</a>
    {{-- @dd($categories); --}}
    {{-- @dd($category); --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th colspan="2" class="text-center">Action</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
          <tr>
            <th scope="row">{{ $category->id}}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->status}}</td>
            <td>
                <a class="btn btn-info" href="{{route('categories.edit', $category->id)}}">Edit</a>
            </td>
            <td>
                <form action="{{route('categories.delete', $category->id)}}" method="POST">
                    @csrf
                    <button class="btn btn-primary" value="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

</body>
</html>
@endsection
