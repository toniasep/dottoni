<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function city(Request $request)
    {
        $id = $request->input('id');
        $source = $request->input('source') ? $request->input('source') : "api";
        if ($source == "db") {
            $city = DB::table('city')
                ->where('city_id', $id)
                ->get();
            if ($city->isEmpty()) {
                $city = [];
            }
        }else{
            $response = Http::withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->get('https://api.rajaongkir.com/starter/city/?id='.$id);
            $response = json_decode($response, true);
            $city = $response['rajaongkir']['results'];
        }
        if (empty($city)) {
            return response()->json([
                'data source' => $source,
                'status' => 'gagal',
                'data' => 'Data kota tidak ditemukan.',
            ]);
        }
        return response()->json([
            'data source' => $source,
            'status' => 'berhasil',
            'data' => $city,
        ]);
    }

    public function province(Request $request)
    {
        $id = $request->input('id');
        $source = $request->input('source');
        if ($source == "db") {
            $province = DB::table('province')
            ->where('province_id', $id)
                ->get();
            if ($province->isEmpty()) {
                $province = [];
            }
        } else {
            $response = Http::withHeaders([
                'key' => env('RAJAONGKIR_API_KEY')
            ])->get('https://api.rajaongkir.com/starter/province/?id=' . $id);
            $response = json_decode($response, true);
            $province = $response['rajaongkir']['results'];
        }
        if (empty($province)) {
            return response()->json([
                'data source' => $source,
                'status' => 'gagal',
                'data' => 'Data provinsi tidak ditemukan.',
            ]);
        }
        return response()->json([
            'data source' => $source,
            'status' => 'berhasil',
            'data' => $province,
        ]);
    }
}
