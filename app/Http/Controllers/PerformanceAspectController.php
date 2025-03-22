<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformanceAspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $evaluationId)
    {
        $validated = $request->validate([
            'aspect_name' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:5',
        ]);

        PerformanceAspect::create([
            'evaluation_id' => $evaluationId,
            'aspect_name' => $validated['aspect_name'],
            'score' => $validated['score'],
        ]);

        return redirect()->route('evaluations.show', $evaluationId)->with('success', 'Aspect added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
