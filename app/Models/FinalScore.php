<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    use HasFactory;

    protected $fillable = ['evaluation_id', 'performance_total', 'behavioral_total', 'project_score', 'final_score', 'evaluation_category'];

    public function evaluation()
    {
        return $this->belongsTo(PerformanceEvaluation::class);
    }
}