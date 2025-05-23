<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrganizationCompaign;
use App\Http\Requests\StoreOrganizationCompaignRequest;
use App\Http\Requests\UpdateOrganizationCompaignRequest;
class OrganizationCompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organization_compaigns = OrganizationCompaign::with('organization','compaign')->get();
        return response()->json(["organization_compaigns"=>$organization_compaigns]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationCompaignRequest $request)
    {
        $organization_compaign = OrganizationCompaign::create($request->validated());
        return response()->json(["organization_compaign"=>$organization_compaign]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationCompaign $organization_compaign)
    {
        return response()->json(["organization_compaign"=>$organization_compaign->load('organization','compaign')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationCompaignRequest $request, OrganizationCompaign $organization_compaign)
    {
        $organization_compaign->update($request->all());
        return response()->json(["organization_compaign"=>$organization_compaign]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationCompaign $organization_compaign)
    {
        $organization_compaign->delete();
        return response()->json(['status' => 'success']);

    }
}
