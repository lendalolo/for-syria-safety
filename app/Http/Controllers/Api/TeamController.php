<?php

namespace App\Http\Controllers\Api;


use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Routing\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $team = Team::with('teamPosition','comppaigns','users','teamReport')->get();
        return response()->json(['teams' => $team], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $team = Team::create($request->validated());
        return response()->json(['team' => $team]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return response()->json(['teams' => $team->load('teamPosition','comppaigns','users','teamReport')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->update($request->validated());
        return response()->json(['reward' => $team]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(['status' => 'success']);
    }
}
