@extends("layouts.app")
@section('content')
    <form class="container" action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Name</label>
            <input class="form-control" type="text" name='name'>
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input class="form-control" type="text" name='email'>
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input class="form-control" type="password" name='password'>
        </div>
        <div class="form-group mb-3">
            <label for="">Password Confirmation</label>
            <input class="form-control" type="password" name='password_confirmation'>
        </div>
        <div class="form-group mb-3">
            <select name="role_id" id="">
                @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <button value="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

