<?php

namespace App\Services;

use App\Models\Clinic;

class ClinicService
{
    public function getAllClinics()
    {
        return Clinic::all();
    }

    public function findNearbyClinics($latitude, $longitude, $radius = 10)
    {
        // Simple bounding box or Haversine formula
        // For now, returning all for simplicity, but ready for GPS logic
        return Clinic::all();
    }
}
