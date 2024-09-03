<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'job_vacancy_id',
        'status',
    ];

    public function jobSeekerProfile()
    {
        return $this->belongsTo(JobSeekerProfile::class, 'job_seeker_id');
    }

    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class);
    }
}
