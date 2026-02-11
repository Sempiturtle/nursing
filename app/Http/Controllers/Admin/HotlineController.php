<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotline;
use Illuminate\Http\Request;

class HotlineController extends Controller
{
    public function index()
    {
        $hotlines = Hotline::latest()->get();
        return view('admin.hotlines.index', compact('hotlines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'region' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        Hotline::create($validated);

        return back()->with('success', 'Hotline added successfully.');
    }

    public function update(Request $request, Hotline $hotline)
    {
        $validated = $request->validate([
            'region' => 'required|string|max:255',
            'agency' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        $hotline->update($validated);

        return back()->with('success', 'Hotline updated successfully.');
    }

    public function destroy(Hotline $hotline)
    {
        $hotline->delete();
        return back()->with('success', 'Hotline deleted successfully.');
    }
}
