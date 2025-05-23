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
        $compaigns = Compaign::with(['team.users','location','media','toolCompaigns','organizationCompaign','step'])->get();
        return response()->json(['compaigns' => $compaigns], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaignRequest $request)
    {
        $compaign = Compaign::create($request->validated());
        if ($request->media) {
        $compaign->addMediaFromRequest('media')->toMediaCollection('compaigns');
        }
        return response()->json(['compaign' => $compaign->load('team.users ','location','media')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compaign $compaign)
    {
        return response()->json(['compaign' => $compaign->load('team','location','media','toolCompaigns','organizationCompaign','step')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaignRequest $request, Compaign $compaign)
    {
        $compaign->update($request->validated());
        if ($request->media) {
                $compaign->clearMediaCollection('compaigns');
                $compaign->addMediaFromRequest('media')->toMediaCollection('compaigns');
        }
        return response()->json(['compaign' => $compaign->load('team','location','media')]);
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
