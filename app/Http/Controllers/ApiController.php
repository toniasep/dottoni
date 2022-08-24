<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function city(Request $request)
    {
        $id = $request->input('id');
        $city = DB::table('city')
            ->where('city_id', $id)
            ->get();

        if ($city->isEmpty()) {
            return response()->json([
                'status' => 'gagal',
                'data' => 'Data kota tidak ditemukan.',
            ]);
        }
        return response()->json([
            'status' => 'berhasil',
            'data' => $city,
        ]);
    }

    public function province(Request $request)
    {
        $id = $request->input('id');
        $province = DB::table('province')
            ->where('province_id', $id)
            ->get();

        if ($province->isEmpty()) {
            return response()->json([
                'status' => 'gagal',
                'data' => 'Data provinsi tidak ditemukan.',
            ]);
        }
        return response()->json([
            'status' => 'berhasil',
            'data' => $province,
        ]);
    }
}
