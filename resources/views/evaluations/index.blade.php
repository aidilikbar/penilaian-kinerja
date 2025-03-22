@extends('layouts.app')

@section('title', 'Evaluations')

@section('content')
<div class="container mt-4">
    <h2>Performance Evaluations</h2>
    <a href="{{ route('evaluations.create') }}" class="btn btn-success mb-3">Add Evaluation</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Evaluator</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->employee->name ?? '—' }}</td>
                    <td>{{ $evaluation->evaluator }}</td>
                    <td>{{ $evaluation->year }}</td>
                    <td>
                        <a href="{{ route('evaluations.show', $evaluation->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this evaluation?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No evaluations found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection