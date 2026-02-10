<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::latest()->get();
        return view('admin.clinics.index', compact('clinics'));
    }

    public function create()
    {
        return view('admin.clinics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'contact_number' => 'nullable|string',
            'services' => 'nullable|string',
            'operating_hours' => 'nullable|string',
        ]);

        Clinic::create($validated);

        return redirect()->route('admin.clinics.index')->with('success', 'Clinic added.');
    }

    public function edit(Clinic $clinic)
    {
        return view('admin.clinics.edit', compact('clinic'));
    }

    public function update(Request $request, Clinic $clinic)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'contact_number' => 'nullable|string',
            'services' => 'nullable|string',
            'operating_hours' => 'nullable|string',
        ]);

        $clinic->update($validated);

        return redirect()->route('admin.clinics.index')->with('success', 'Clinic updated.');
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        return redirect()->route('admin.clinics.index')->with('success', 'Clinic removed.');
    }
}
