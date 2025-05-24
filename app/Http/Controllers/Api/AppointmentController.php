<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $appointments = Appointment::with('team')->get();
    return response()->json(['appointments' => $appointments], 200);
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(StoreAppointmentRequest $request)
    {
    $appointment = Appointment::create($request->validated());
    return response()->json(['appointment' => $appointment->load('team')]);
    }

    /**
    * Display the specified resource.
    */
    public function show(Appointment $appointment)
    {
    return response()->json(['appointment' => $appointment->load('team')], 200);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
    $appointment->update($request->all());
    return response()->json(['appointment' => $appointment->load('team')]);
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(Appointment $appointment)
    {
    $appointment->delete();
    return response()->json(['status' => 'success']);
    }
}