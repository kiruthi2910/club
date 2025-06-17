<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Registration;

class RegController extends Controller
{
    public function showTable()
{
   $registrations = DB::table('registrations')->select('name', 'department', 'club1', 'club2', 'club3')->get();

    $students = [];

    foreach ($registrations as $reg) {
        foreach (['club1', 'club2', 'club3'] as $club) {
            if (!empty($reg->$club)) {
                $students[] = (object) [
                    'name' => $reg->name,
                    'department' => $reg->department,
                    'club_enrolled' => $reg->$club
                ];
            }
        }
    }

    return view('table', ['students' => $students]);
}
}
