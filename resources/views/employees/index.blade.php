@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Age</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($result as $res)
                        <tr>
                            <td>{{$res->id}}</td>
                            <td>{{$res->employee_name}}</td>
                            <td>{{$res->employee_salary}}</td>
                            <td>{{$res->employee_age}}</td>
                            <td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
