@extends('layouts.app')

@section('title', 'Employees')

@section('content')
<h2>Employee List</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Actions</th>
    </tr>
    @foreach ($employees as $employee)
    <tr>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->position }}</td>
        <td><a href="{{ route('employees.show', $employee->id) }}">View</a></td>
    </tr>
    @endforeach
</table>
@endsection