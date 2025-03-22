@extends('layouts.app')

@section('title', 'Add Evaluation')

@section('content')
<div class="container mt-4">
    <h2>Add Evaluation</h2>

    <form method="POST" action="{{ route('evaluations.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Employee</label>
            <select name="employee_id" class="form-select" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Evaluator</label>
            <input type="text" name="evaluator" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection