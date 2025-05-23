<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Http\Requests\UpdateToolRequest;
// use Illuminate\Routing\Controller;
use App\Models\Donation;
use App\Models\Teamposition;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = Donation::with('tool','user')->get();
        return response()->json(['donations' => $donations], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonationRequest $request)
    {
        $donation = Donation::create($request->validated());
        return response()->json(['donation' => $donation->load('user','tool')
        ,'message' =>  __('Operation completed successfully'),
                //'Donation '
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        return response()->json(['donation' => $donation->load('user','tool')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $donation->update($request->all());
        return response()->json(['donation' => $donation->load('user','tool')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        $donation->delete();
        return response()->json(['status' => 'success']);
    }

}
