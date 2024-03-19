@extends("layouts.app")
@section('content')
    <form class="container" action="{{route('permissions.store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Permission</label>
            <input class="form-control" type="text" name='permission'>
        </div>

        <button value="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

