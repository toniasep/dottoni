<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class FetchRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:rajaongkir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'untuk fetching data kota dan provinsi';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Provinsi
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/province');
        $response = json_decode($response, true);
        if ($response['rajaongkir']['status']['code'] == 200) {
            $province = $response['rajaongkir']['results'];
            try {
                DB::table('province')->insert($province);
                $this->info("Data Provinsi sudah ditambahkan ke database");
            } catch (\Illuminate\Database\QueryException $ex) {
                $this->info("Data Provinsi sudah ditambahkan sebelumnya");
            }
        } else {
            $this->info($response['rajaongkir']['status']['description']);
        }

        //Kota
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/city');
        $response = json_decode($response, true);
        if ($response['rajaongkir']['status']['code'] == 200) {
            $city = $response['rajaongkir']['results'];
            try {
                DB::table('city')->insert($city);
                $this->info("Data Kota sudah ditambahkan ke database");
            } catch (\Illuminate\Database\QueryException $ex) {
                $this->info("Data Kota sudah ditambahkan sebelumnya");
            }
        }
    }
}
