<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobSeekerProfileRequest;
use App\Http\Requests\UpdateJobSeekerProfileRequest;
use App\Models\JobSeekerProfile;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobSeekerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $profiles = JobSeekerProfile::with('user')->get();
        return response()->json($profiles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobSeekerProfileRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $profile = $request->user()->jobSeekerProfile()->create($validated);

        return response()->json([
            'message' => 'Profile created successfully',
            'data' => $profile,

        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobSeekerProfile $jobSeekerProfile): JsonResponse
    {
        $jobSeekerProfile->load('user');
        return response()->json($jobSeekerProfile, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobSeekerProfileRequest $request, JobSeekerProfile $jobSeekerProfile): JsonResponse
    {
        $validated = $request->validated();
        $jobSeekerProfile->update($validated);

        return response()->json([
            'message' => 'Profile updated successfully',
            'data' => $jobSeekerProfile,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobSeekerProfile $jobSeekerProfile): JsonResponse
    {
        $jobSeekerProfile->delete();

        return response()->json([
            'message' => 'Profile deleted successfully',
            'data' => null,
        ], 204);
    }
}
