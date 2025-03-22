<?php

namespace App\Http\Controllers;

use App\Models\PerformanceEvaluation;
use App\Models\Employee;
use Illuminate\Http\Request;

class PerformanceEvaluationController extends Controller
{
    /**
     * Display a listing of the evaluations.
     */
    public function index()
    {
        $evaluations = PerformanceEvaluation::with('employee')->latest()->get();

        return view('evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new evaluation.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('evaluations.create', compact('employees'));
    }

    /**
     * Store a newly created evaluation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'evaluator' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:2000',
        ]);

        $evaluation = PerformanceEvaluation::create($validated);

        return redirect()->route('evaluations.show', $evaluation->id)->with('success', 'Evaluation created successfully.');
    }

    /**
     * Display the specified evaluation and its tabbed components.
     */
    public function show($id)
    {
        $evaluation = PerformanceEvaluation::with([
            'employee',
            'performanceAspects',
            'behavioralAspects',
            'projects',
            'finalScore',
            'feedback',
        ])->findOrFail($id);

        return view('evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the evaluation (optional).
     */
    public function edit($id)
    {
        $evaluation = PerformanceEvaluation::findOrFail($id);
        $employees = Employee::all();

        return view('evaluations.edit', compact('evaluation', 'employees'));
    }

    /**
     * Update the specified evaluation.
     */
    public function update(Request $request, $id)
    {
        $evaluation = PerformanceEvaluation::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'evaluator' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:2000',
        ]);

        $evaluation->update($validated);

        return redirect()->route('evaluations.show', $evaluation->id)->with('success', 'Evaluation updated.');
    }

    /**
     * Remove the specified evaluation.
     */
    public function destroy($id)
    {
        $evaluation = PerformanceEvaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Evaluation deleted.');
    }
}