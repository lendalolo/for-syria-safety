<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStepsRequest;
use App\Http\Requests\UpdateStepsRequest;
use App\Models\Steps;
use App\Models\Tools;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $steps = Steps::with('compaigns')->get();
        return response()->json(['steps' => $steps], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStepsRequest $request)
    {
        $steps = Tools::create($request->validated());
        return response()->json(['steps' => $steps]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Steps $steps)
    {
        return response()->json(['steps' => $steps->load('toolCompaigns','compaigns')], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStepsRequest $request, Steps $step)
    {
        $step->update($request->validated());
        return response()->json(['step' => $step]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Steps $step)
    {
        $step->delete();
        return response()->json(['status' => 'success']);
    }
}
