<?php

namespace App\Http\Controllers\Api;

use App\Models\TeamReport;
use App\Http\Requests\StoreTeamReportRequest;
use App\Http\Requests\UpdateTeamReportRequest;
use Illuminate\Routing\Controller;

class TeamReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamReport = TeamReport::with('team','report')->get();
        return response()->json(['teamReport' => $teamReport], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamReportRequest $request)
    {
        $teamReport = TeamReport::create($request->validated());
        return response()->json(['teamReport' => $teamReport]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamReport $teamReport)
    {

        return response()->json(['teams' => $teamReport->load('team','report')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamReportRequest $request, TeamReport $teamReport)
    {
        $teamReport->update($request->validated());
        return response()->json(['teamReport' => $teamReport]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamReport $teamReport)
    {
        $teamReport->delete();
        return response()->json(['status' => 'success']);
    }
}
