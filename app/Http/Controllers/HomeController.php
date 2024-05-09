<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function list_agen46()
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')->get();
        return view('dashboard.list-agen46', compact('data_agen'));
    }

    public function simple_map()
    {
        return view('leaflet.simple-map');
    }

    public function about()
    {
        return view('dashboard.about');
    }

    public function testing()
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')->get();
        return view('testing', compact('data_agen'));
    }


}
