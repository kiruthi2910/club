<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Count of all registrations
        $totalApplications = DB::table('registrations')->count();

        // Count of unique students by regno
        $totalStudents = DB::table('registrations')
            ->select('regno')
            ->distinct()
            ->count();

        // Get latest 5 registrations
        $recentRegistrations = DB::table('registrations')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Department-wise count
        $departmentDistribution = DB::table('registrations')
            ->select('department', DB::raw('count(*) as total'))
            ->groupBy('department')
            ->pluck('total', 'department')
            ->toArray();

        // Flatten all club1, club2, club3 into one list
        $allClubs = DB::table('registrations')
            ->select('club1', 'club2', 'club3')
            ->get()
            ->flatMap(function ($row) {
                return collect([$row->club1, $row->club2, $row->club3])->filter();
            });

        // Count unique clubs
        $totalClubs = $allClubs->unique()->count();

        // Top 5 most popular clubs
        $popularClubs = $allClubs->countBy()->sortDesc()->take(5)->toArray();

        // Pass all data to the dashboard view
        return view('dash', [
            'totalApplications' => $totalApplications,
            'totalStudents' => $totalStudents,
            'recentRegistrations' => $recentRegistrations,
            'departmentDistribution' => $departmentDistribution,
            'popularClubs' => $popularClubs,
            'totalClubs' => $totalClubs,
        ]);
    }
}
