<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class HomeController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }

    public function list_agen46()
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')
        ->paginate(5);
        return view('dashboard.list-agen46', compact('data_agen'));
    }

    // public function simple_map()
    // {
    //     $agen = DB::table('data_agen')->orderBy('kode_agen')->get();

    //     return view('leaflet.simple-map', compact('agen'));
    // }

    public function simple_v2()
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')->get();

        return view('leaflet.simple-v2', compact('data_agen'));
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

    
    public function dashboardadmin()
    {
        return view('dashboard.admin.dashboardadmin');
    }

    public function list_agen46admin()
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')
        ->paginate(5);
        return view('dashboard.admin.list-agen46admin', compact('data_agen'));
    }

    public function store(Request $request)
    {
        $kode_agen = $request->kode_agen;
        $nama_agen = $request->nama_agen;
        $alamat = $request->alamat;
        $kecamatan = $request->kecamatan;
        $kota = $request->kota;
        $keterangan = $request->keterangan;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        try {
            $data = [
                'kode_agen' => $kode_agen,
                'nama_agen' => $nama_agen,
                'alamat' => $alamat,
                'kecamatan' => $kecamatan,
                'kota' => $kota,
                'keterangan' => $keterangan,
                'latitude' => $latitude,
                'longitude' => $longitude,
                
            ];
            $simpan = DB::table('data_agen')->insert($data);
            if ($simpan) {
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {
            if($e->getCode()==23000){
                $message = " KODE AGEN ". $kode_agen. " Sudah Ada";
            }
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan'.$message]);
        }
    }

    public function edit(Request $request)
    {
        $kode_agen = $request->kode_agen;
        // $departemen = DB::table('departemen')->get();
        $data_agen = DB::table('data_agen')->where('kode_agen', $kode_agen)->first();
        return view('dashboard.admin.edit', compact('data_agen'));
    }

    public function update($kode_agen, Request $request)
    {
        $kode_agen = $request->kode_agen;
        $nama_agen = $request->nama_agen;
        $alamat = $request->alamat;
        $kecamatan = $request->kecamatan;
        $kota = $request->kota;
        $keterangan = $request->keterangan;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        try {
            $data = [
                'nama_agen' => $nama_agen,
                'alamat' => $alamat,
                'kecamatan' => $kecamatan,
                'kota' => $kota,
                'keterangan' => $keterangan,
                'latitude' => $latitude,
                'longitude' => $longitude,
                
            ];
            $update = DB::table('data_agen')->where('kode_agen', $kode_agen)->update($data);
            if ($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Dipudate']);
            }
        } catch (\Exception $e) {
            if($e->getCode()==23000){
                $message = " KODE AGEN ". $kode_agen. " Sudah Ada";
            }
            return Redirect::back()->with(['warning' => 'Data Gagal Dipudate'.$message]);
        }
    }

    public function delete($kode_agen){
        $delete = DB::table('data_agen')->where('kode_agen', $kode_agen)->delete();
        if($delete){
            return Redirect::back()->with(['success'=>'Data Berhasil Dihpaus']);
        } else{
            return Redirect::back()->with(['warning'=>'Data Gagal Dihpaus']);
        }
    }

    public function simple_v2admin()
    {
        $data_agen = DB::table('data_agen')->orderBy('kode_agen')->get();

        return view('dashboard.admin.simple-v2admin', compact('data_agen'));
    }
}
