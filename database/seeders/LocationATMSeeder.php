<?php

namespace Database\Seeders;

use App\Models\LocationATM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationATMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LocationATM::truncate();
  
        $csvFile = fopen(base_path("database/data/locationATM.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                LocationATM::create([
                    "nama_atm" => $data['0'],
                    "latitude" => $data['1'],
                    "longitude" => $data['2']
                ]); 
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
