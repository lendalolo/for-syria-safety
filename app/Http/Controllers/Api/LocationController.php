<?php

namespace App\Http\Controllers\Api;


use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use Illuminate\Routing\Controller;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::with('reports.teamReports.team','compaigns.tools',)->get();
        return response()->json(['locations' => $location]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->validated());
        return response()->json(['locations' => $location->load('reports','compaigns.tools')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {

        return response()->json(['location' => $location->load('reports','compaigns.tools')], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->validated());
        return response()->json(['location' => $location->load('reports','compaigns.tools')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json(['status' => 'success']);
    }
}
