@extends("layouts.app")
@section('content')
    <form class="container" action="{{route('users.update', $user->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input class="form-control" type="text" name='name' value="{{$user->name}}">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input class="form-control" type="text" name='email' value="{{$user->email}}">
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input class="form-control" type="text" name='password'>
        </div>
        <div class="form-group mb-3">
            <label for="">Confirm Password</label>
            <input class="form-control" type="text" name='password_confirmation'>
        </div>

        <button value="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

