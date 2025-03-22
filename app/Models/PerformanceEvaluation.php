<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceEvaluation extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'evaluator', 'year'];

    public function performanceAspects()
    {
        return $this->hasMany(PerformanceAspect::class, 'evaluation_id');
    }

    public function behavioralAspects()
    {
        return $this->hasMany(BehavioralAspect::class, 'evaluation_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'evaluation_id');
    }

    public function finalScore()
    {
        return $this->hasOne(FinalScore::class, 'evaluation_id');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'evaluation_id');
    }
}
