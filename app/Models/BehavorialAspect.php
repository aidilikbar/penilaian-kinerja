<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BehavioralAspect extends Model
{
    use HasFactory;

    protected $fillable = ['evaluation_id', 'competency', 'behavioral_standard', 'score'];

    public function evaluation()
    {
        return $this->belongsTo(PerformanceEvaluation::class);
    }
}