<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobApplicationRequest;
use App\Http\Requests\UpdateJobApplicationRequest;
use App\Models\JobApplication;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        if ($request->user()->hasRole('job_seeker')) {
            $applications = $request->user()->jobSeekerProfile->jobApplications()->with('jobVacancy')->get();
        } elseif ($request->user()->hasRole('employer')) {
            $applications = JobApplication::whereHas('jobVacancy', function ($query) use ($request) {
                $query->where('employer_id', $request->user()->employerProfile->id);
            })->with('jobVacancy', 'jobSeekerProfile.user')->get();
        } else {
            $applications = [];
        }

        return response()->json($applications, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobApplicationRequest $request): JsonResponse
{
    $validated = $request->validated();

    // Verifica que el usuario tenga el rol de 'job_seeker'
    if ($request->user()->hasRole('job_seeker')) {
        // Crea la aplicación de trabajo para el usuario solicitante de empleo
        $application = $request->user()->jobSeekerProfile->jobApplications()->create($validated);

        return response()->json([
            'message' => 'Application created successfully',
            'data' => $application,
        ], 201);
    }

    // Si el usuario no es un solicitante de empleo, devuelve un error
    return response()->json(['message' => 'Only job seekers can apply for vacancies'], 403);
}


    /**
     * Display the specified resource.
     */
    public function show(JobApplication $jobApplication): JsonResponse
    {
        $user = request()->user();
        if ($user->hasRole('job_seeker') && $jobApplication->job_seeker_id !== $user->jobSeekerProfile->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($user->hasRole('employer') && $jobApplication->jobVacancy->employer_id !== $user->employerProfile->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $jobApplication->load('JobVacancy', 'jobSeekerProfile.user');
        return response()->json($jobApplication, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication): JsonResponse
    {
        $validated = $request->validated();

        $user = $request->user();

        if ($user->hasRole('employer') && $jobApplication->jobVacancy->employer_id !== $user->employerProfile->id) {
            return response()->json([
                'message' => 'Application updated successfully',
                'data' => $jobApplication,
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $jobApplication): JsonResponse
    {
        $user = request()->user();

        if (
            ($user->hasRole('job_seeker') && $jobApplication->job_seeker_id === $user->jobSeekerProfile->id) ||
            ($user->hasRole('employer') && $jobApplication->jobVacancy->employer_id === $user->employerProfile->id)
        ) {
            $jobApplication->delete();

            return response()->json([
                'message' => 'Application deleted successfully',
                'data' => null,
            ], 200);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
