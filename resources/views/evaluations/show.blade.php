@extends('layouts.app')

@section('title', 'Evaluation Detail')

@section('content')
<div class="container mt-4">
    <h3>Evaluation for {{ $evaluation->employee->name }}</h3>

    <!-- Bootstrap Tabs -->
    <ul class="nav nav-tabs" id="evaluationTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="kinerja-tab" data-bs-toggle="tab" data-bs-target="#kinerja" type="button" role="tab">Aspek Kinerja</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="perilaku-tab" data-bs-toggle="tab" data-bs-target="#perilaku" type="button" role="tab">Aspek Perilaku</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="project-tab" data-bs-toggle="tab" data-bs-target="#project" type="button" role="tab">Project</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="nilai-akhir-tab" data-bs-toggle="tab" data-bs-target="#nilai-akhir" type="button" role="tab">Nilai Akhir</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tanggapan-tab" data-bs-toggle="tab" data-bs-target="#tanggapan" type="button" role="tab">Tanggapan</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="evaluationTabsContent">
        <div class="tab-pane fade show active" id="kinerja" role="tabpanel">
            @include('evaluations.partials.performance-aspects', ['aspects' => $evaluation->performanceAspects])
        </div>
        <div class="tab-pane fade" id="perilaku" role="tabpanel">
            @include('evaluations.partials.behavioral-aspects', ['behaviors' => $evaluation->behavioralAspects])
        </div>
        <div class="tab-pane fade" id="project" role="tabpanel">
            @include('evaluations.partials.projects', ['projects' => $evaluation->projects])
        </div>
        <div class="tab-pane fade" id="nilai-akhir" role="tabpanel">
            @include('evaluations.partials.final-score', ['score' => $evaluation->finalScore])
        </div>
        <div class="tab-pane fade" id="tanggapan" role="tabpanel">
            @include('evaluations.partials.feedback', ['feedback' => $evaluation->feedback])
        </div>
    </div>
</div>
@endsection