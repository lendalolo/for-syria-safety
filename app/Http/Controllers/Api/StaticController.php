<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Report;
use App\Models\Team;
use App\Models\Compaign;
use App\Models\Organization;
use App\Models\Appointment;
use App\Models\Tool;
use App\Models\Donation;
use App\Models\Location;
class StaticController extends Controller
{
    public function static(){
        $users_count = User::count();
        $report_count = Report::count();
        $teams_count = Team::count();
        $compaigns_count = Compaign::count();
        $organizations_count = Organization::count();
        $appointments_count = Appointment::count();
        $tools_count = Tool::count();
        $donations_count = Donation::count();
        $danger_locations_count = Location::where('status','danger')->count();
        $warning_locations_count = Location::where('status','warning')->count();
        $locations_count = Location::count();
        $warning_locations_avg = ($warning_locations_count/$locations_count) *100;
        $danger_locations_avg = ($danger_locations_count/$locations_count) *100;

        $latest_danger_report = Location::with('reports')->where('status','danger')->orderBy('created_at','desc')->get();
        $teams_waiting_count = Team::where('status','waiting')->count();
        $teams_available_count = Team::where('status','available')->count();
        $teams_busy_count = Team::where('status','busy')->count();
        $location_danger_created_at_count = Location::select(
             DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count'),
            )->where('status','danger')->groupBy('date')->orderBy('date','asc')->get();
        $reports_created_at_count = Report::select(
                 DB::raw('DATE(created_at) as date'),
                 DB::raw('COUNT(*) as count'),
        )->groupBy('date')->orderBy('date','asc')->get();
        return response()->json([
            'users_count'=>$users_count,
            'report_count'=>$report_count,
            'teams_count'=>$teams_count,
            'compaigns_count'=>$compaigns_count,
            'organizations_count'=>$organizations_count,
            'appointments_count'=>$appointments_count,
            'tools_count'=>$tools_count,
            'donations_count'=>$donations_count,
            'danger_locations_count'=>$danger_locations_count,
            'danger_locations_avg'=>$danger_locations_avg,
            'warning_locations_count'=>$warning_locations_count,
            'warning_locations_avg'=>$warning_locations_avg,
            'latest_danger_report'=>$latest_danger_report,
            'teams_waiting_count'=>$teams_waiting_count,
            'teams_available_count'=>$teams_available_count,
            'teams_busy_count'=>$teams_busy_count,
            'reports_created_at_count'=>$reports_created_at_count,
            'location_danger_created_at_count'=>$location_danger_created_at_count,

        ]);

    }
}