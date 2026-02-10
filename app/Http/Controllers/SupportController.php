<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected $clinicService;

    public function __construct(\App\Services\ClinicService $clinicService)
    {
        $this->clinicService = $clinicService;
    }

    public function clinics()
    {
        $clinics = $this->clinicService->getAllClinics();
        return view('support.clinics', compact('clinics'));
    }

    public function hotlines()
    {
        $hotlines = \App\Models\Hotline::orderBy('region')->get();
        return view('support.hotlines', compact('hotlines'));
    }
}
