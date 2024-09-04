<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployerProfileRequest;
use App\Http\Requests\UpdateEmployerProfileRequest;
use App\Models\EmployerProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $profiles = EmployerProfile::with('user')->get();
        return response()->json($profiles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployerProfileRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $profile = $request->user()->employerProfile()->create($validated);

        return response()->json([
            'message' => 'Employer Profile created successfully',
            'data' => $profile,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(EmployerProfile $employerProfile): JsonResponse
    {
        $employerProfile->load('user');
        return response()->json($employerProfile, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployerProfileRequest $request, EmployerProfile $employerProfile): JsonResponse
    {
        $validated = $request->validated();
        $employerProfile->update($validated);

        return response()->json([
            'message' => 'Employer Profile updated successfully',
            'data' => $employerProfile,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployerProfile $employerProfile): JsonResponse
    {
        $employerProfile->delete();

        return response()->json([
            'message' => 'Employer Profile deleted successfully',
            'data' => null,
        ], 200);
    }
}
