<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobVacancyRequest;
use App\Http\Requests\UpdateJobVacancyRequest;
use App\Models\JobVacancy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $vacancies = JobVacancy::with('employerProfile.user')->get();
        return response()->json($vacancies, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobVacancyRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $vacancy = $request->user()->employerProfile->jobVacancies()->create($validated);

        return response()->json([
            'message' => 'Vacancy created successfully',
            'data' => $vacancy,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobVacancy $jobVacancy): JsonResponse
    {
        $jobVacancy->load('employerProfile.user');
        return response()->json($jobVacancy, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobVacancyRequest $request, JobVacancy $jobVacancy): JsonResponse
    {
        $validated = $request->validated();
        $jobVacancy->update($validated);

        return response()->json([
            'message' => 'Vacancy updated successfully',
            'data' => $jobVacancy,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobVacancy $jobVacancy): JsonResponse
    {
        $jobVacancy->delete();

        return response()->json([
            'message' => 'Vacancy deleted successfully',
            'data' => null,
        ], 200);
    }
}
