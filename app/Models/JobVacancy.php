<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'job_title',
        'job_description',
        'requirements',
        'location',
    ];

    public function employerProfile()
    {
        return $this->belongsTo(EmployerProfile::class, 'employer_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}
