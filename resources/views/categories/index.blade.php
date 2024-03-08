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
            <th scope="col">Action</th>
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
                <a href="{{route('categories.edit', $category->id)}}">Edit</a>
                <form action="{{route('categories.delete', $category->id)}}" method="POST">
                    @csrf
                    <button value="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

</body>
</html>
@endsection
