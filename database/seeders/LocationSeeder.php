<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::truncate();
  
        $csvFile = fopen(base_path("database/data/location.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Location::create([
                    "nama_cabang" => $data['0'],
                    "alamat" => $data['1'],
                    "latitude" => $data['2'],
                    "longitude" => $data['3']
                ]); 
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
