@extends('layouts.app')

@section('title', 'Edit Evaluation')

@section('content')
<div class="container mt-4">
    <h2>Edit Evaluation</h2>

    <form method="POST" action="{{ route('evaluations.update', $evaluation->id) }}">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Employee</label>
            <select name="employee_id" class="form-select" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $evaluation->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Evaluator</label>
            <input type="text" name="evaluator" class="form-control" value="{{ $evaluation->evaluator }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year" class="form-control" value="{{ $evaluation->year }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection