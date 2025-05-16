<?php

namespace App\Http\Controllers\Api;


use App\Models\Teamposition;
use App\Http\Requests\StoreTeampositionRequest;
use App\Http\Requests\UpdateTeampositionRequest;
use Illuminate\Routing\Controller;

class TeampositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamPosition = Teamposition::with(['teams'])->get();
        return response()->json(['teamPosition' => $teamPosition], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeampositionRequest $request)
    {
        $teamPosition = Teamposition::create($request->validated());
        return response()->json(['teamPosition' => $teamPosition->load('teams')], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teamposition $teamposition)
    {
        return response()->json(['teamposition' => $teamposition], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeampositionRequest $request, Teamposition $teamposition)
    {
        $teamposition->update($request->validated());
        return response()->json(['teamposition' => $teamposition]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teamposition $teamposition)
    {
        $teamposition->delete();
        return response()->json(['status' => 'success']);
    }
}
