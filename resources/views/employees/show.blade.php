@extends('layouts.master')
@section('content')

<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Age</th>

    </thead>
    <tbody>
        @foreach ($result as $res)
        <tr>
            <td>{{$res->id}}</td>
            <td>{{$res->employee_name}}</td>
            <td>{{$res->employee_salary}}</td>
            <td>{{$res->employee_age}}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
