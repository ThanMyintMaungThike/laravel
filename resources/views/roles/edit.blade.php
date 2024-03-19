@extends("layouts.app")
@section('content')
    <form class="container" action="{{route('roles.update', $role->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="">Role</label>
            <input class="form-control" type="text" name='role' value="{{$role->name}}">
            <label for="">Permission</label>
            <select class="selectpicker" multiple="multiple" data-live-search="true" data-selected-text-format="value" name="permission[]">
             @foreach ($permissions as $permission)
                 <option value="{{$permission->name}}">{{$permission->name}}</option>
             @endforeach
            </select>
        </div>
        <button value="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

