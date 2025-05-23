<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreObjectiveRequest;
use App\Http\Requests\UpdateObjectiveRequest;
use App\Models\Objective;
use App\Models\Team;
use App\Models\Teamposition;
use Illuminate\Support\Facades\Auth;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objectives = Objective::with('learn')->get();
        return response()->json(['objectives' => $objectives], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObjectiveRequest $request)
    {
        $objective = Objective::create($request->validated());
        return response()->json(['objective' => $objective->load('learn')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Objective $objective)
    {
        return response()->json(['objective' => $objective->load('learn')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObjectiveRequest $request, Objective $objective)
    {
        $objective->update($request->all());
        return response()->json(['objective' => $objective->load('learn')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objective $objective)
    {
        $objective->delete();
        return response()->json(['status' => 'success']);
    }

}
