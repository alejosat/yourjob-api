<?php

namespace Database\Seeders;

use App\Models\EmployerProfile;
use App\Models\JobApplication;
use App\Models\JobSeekerProfile;
use App\Models\JobVacancy;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create()->each(function ($user) {
            if ($user->hasRole('job_seeker')) {
                JobSeekerProfile::factory()->create(['user_id' => $user->id]);
            } elseif ($user->hasRole('employer')) {
                $employerProfile = EmployerProfile::factory()->create(['user_id' => $user->id]);
                JobVacancy::factory(3)->create(['employer_id' => $employerProfile->id]);
            }
        });

        JobApplication::factory(30)->create();
    }
}
