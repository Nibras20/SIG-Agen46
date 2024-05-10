<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    public function json(Request $request)
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')->get();

        $userCoordinate = $request->userLocation;

        $data_agen->each(function($row) use ($userCoordinate) {
            $row->distance = sqrt(pow($userCoordinate['latitude'] - $row->latitude, 2) + pow($userCoordinate['longitude'] - $row->longitude, 2)) * 111.319 * 1000;

            return $row;
        });

        // $distance = sqrt(pow($latUser - $latStore, 2) + pow($longUser - $longStore, 2)) * 111.319 * 1000;

        return response()->json([
            "data" => $data_agen,
            // "distance" => $distance
        ]);
    }
}
