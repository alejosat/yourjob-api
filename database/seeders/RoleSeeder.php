<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating roles
        $employerRole = Role::create(['name' => 'employer']);
        $jobSeekerRole = Role::create(['name' => 'job_seeker']);

        // Creating permissions to roles
        $employerRole->givePermissionTo('create job');
        $jobSeekerRole->givePermissionTo('apply for job');
    }
}
