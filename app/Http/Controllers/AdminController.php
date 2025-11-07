<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function statistikEmisi()
    {
        // Dummy data — tinggal ganti kalau sudah pakai database
        $emissionReports = [
            ['university' => 'Brawijaya University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
            ['university' => 'Indonesian University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
            ['university' => 'Airlangga University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
            ['university' => 'Gadjah Mada University', 'total' => '1050 Kg CO2', 'avg' => '763 Kg CO2'],
        ];

        $challengeReports = [
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
            ['participant' => 'Kucing Marah', 'challenge' => 'Sepeda 30 Hari', 'points' => 95, 'status' => 'Active'],
        ];

        return view('statistikemisi', compact('emissionReports', 'challengeReports'));
    }
}
