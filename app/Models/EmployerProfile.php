<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location',
        'industry',
        'number_of_employees',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class, 'employer_id');
    }
}
