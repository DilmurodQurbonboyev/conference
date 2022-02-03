<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\MCategoryTranslation;

class McategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/m_category_translations.json");
        $mcategories = json_decode($json);

        foreach ($mcategories as $mcategory) {
            MCategoryTranslation::create([
                "id" => $mcategory->id,
                "m_category_id" => $mcategory->m_category_id,
                "title" => $mcategory->title,
                "locale" => $mcategory->locale,
                "created_at" => $mcategory->created_at,
                "updated_at" => $mcategory->updated_at
            ]);
        }
    }
}
