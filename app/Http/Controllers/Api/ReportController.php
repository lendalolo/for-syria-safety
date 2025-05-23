<?php

namespace App\Http\Controllers\Api;


use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with('user','reward','location','teamReports')->get();
        return response()->json(['reports' => $reports], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $report = Report::create($request->validated());
        return response()->json(['report' => $report->load('user','reward','location','teamReports')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return response()->json(['reports' => $report->load('user','reward','location','teamReports')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->update($request->validated());
        return response()->json(['report' => $report->load('user','reward','location','teamReports')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json(['status' => 'success']);
    }
}
