@extends("layouts.app")
@section('content')
    <form class="container" action="{{route('permissions.update', $permission->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="">Permission</label>
            <input class="form-control" type="text" name='permission' value="{{$permission->name}}">
        </div>

        <button value="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

