<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceAspect extends Model
{
    use HasFactory;

    protected $fillable = ['evaluation_id', 'aspect_name', 'score'];

    public function evaluation()
    {
        return $this->belongsTo(PerformanceEvaluation::class);
    }
}