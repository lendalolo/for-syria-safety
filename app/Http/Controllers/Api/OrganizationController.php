<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::with('compaigns')->get();
        return response()->json(["organizations"=>$organizations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create($request->validated());
        return response()->json(["organization"=>$organization->load('compaigns')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        return response()->json(["organization"=>$organization->load('compaigns')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());
        return response()->json(["organization"=>$organization->load('compaigns')]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return response()->json(['status' => 'success']);

    }
}