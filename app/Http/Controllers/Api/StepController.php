<?php

namespace App\Http\Controllers\Api;

use App\Models\Step;
use App\Http\Requests\StoreStepRequest;
use App\Http\Requests\UpdateStepRequest;
use Illuminate\Routing\Controller;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $steps = Step::with('compaigns')->get();
        return response()->json(['steps' => $steps], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStepRequest $request)
    {
        $step = Step::create($request->validated());
        return response()->json(['step' => $step->load('compaigns')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Step $step)
    {
        return response()->json(['step' => $step->load('compaigns')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStepRequest $request, Step $step)
    {
        $step->update($request->validated());
        return response()->json(['step' => $step->load('compaigns')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Step $step)
    {
        $step->delete();
        return response()->json(['status' => 'success']);
    }
}
