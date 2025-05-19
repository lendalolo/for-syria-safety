<?php

namespace App\Http\Controllers\Api;


use App\Models\Compaign;
use App\Http\Requests\StoreCompaignRequest;
use App\Http\Requests\UpdateCompaignRequest;
use Illuminate\Routing\Controller;

class CompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaign = Compaign::with(['team','location'])->get();
        return response()->json(['campaign' => $campaign], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaignRequest $request)
    {
        $campaign = Compaign::create($request->validated());
        if ($request->media) {
        $campaign->addMediaFromRequest('media')->toMediaCollection('campaigns');
        }
        return response()->json(['campaign' => $campaign->load('team','location')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compaign $compaign)
    {
        return response()->json(['campaign' => $compaign->load('team','location')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaignRequest $request, Compaign $compaign)
    {
        $compaign->update($request->validated());
        if ($request->media) {
                $campaign->addMediaFromRequest('media')->toMediaCollection('campaigns');
        }
        return response()->json(['campaign' => $compaign->load('team','location')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compaign $compaign)
    {
        $compaign->delete();
        return response()->json(['status' => 'success']);
    }
}