<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return WorkoutResource::collection(Workout::query()->orderBy('id', 'desc')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreWorkoutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkoutRequest $request)
    {
        $data = $request->validated();
        $workout = Workout::create($data);

        return response(new WorkoutResource($workout), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Workout $workout
     * @return WorkoutResource
     */
    public function show(Workout $workout)
    {
        return new WorkoutResource($workout);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateWorkoutRequest $request
     * @param \App\Models\Workout $workout
     * @return WorkoutResource
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        $data = $request->validated();
        $workout->update($data);

        return new WorkoutResource($workout);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Workout $workout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workout $workout)
    {
        $workout->delete();

        return response("", 204);
    }
}
