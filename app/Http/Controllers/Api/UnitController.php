<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;
use App\Models\Teamposition;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::with('teams')->get();
        return response()->json(['units' => $units], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        $unit = Unit::create($request->validated());
        return response()->json(['unit' => $unit]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return response()->json(['unit' => $unit->load('teams')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->all());
        return response()->json(['unit' => $unit]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json(['status' => 'success']);
    }

}
