<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function list_agen46()
    {
        return view('dashboard.list-agen46');
    }

    public function simple_map()
    {
        return view('leaflet.simple-map');
    }

    public function about()
    {
        return view('dashboard.about');
    }
}
