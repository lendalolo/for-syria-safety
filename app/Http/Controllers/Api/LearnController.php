<?php

namespace App\Http\Controllers;

use App\Models\Learn;
use App\Http\Requests\StoreLearnRequest;
use App\Http\Requests\UpdateLearnRequest;

class LearnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLearnRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Learn $learn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearnRequest $request, Learn $learn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learn $learn)
    {
        //
    }
}
