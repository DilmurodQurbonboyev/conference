<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/countries.json");
        $countries = json_decode($json);
        foreach ($countries as $country) {
            Country::create([
                "name_en" => $country->name_en,
                "name_ru" => $country->name_ru,
            ]);
        }
    }
}
