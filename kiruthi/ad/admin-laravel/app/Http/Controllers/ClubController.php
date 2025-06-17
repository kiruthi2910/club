<?php
namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function create()
    {
        return view('form'); // Make sure the blade file is named form.blade.php
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'club_name' => 'required|string|max:255',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'introduction' => 'required|string',
            'staff_coordinator' => 'required|string',
            'staff_email' => 'required|email',
            'year_start' => 'required|digits:4',
        ]);

        // Save image
        $logoName = time().'.'.$request->logo_path->extension();
        $request->logo_path->move(public_path('uploads/logos'), $logoName);
        $validated['logo_path'] = 'uploads/logos/' . $logoName;

        Club::create($validated);

        return redirect()->route('form')->with('success', 'Club created successfully!');
    }
}
