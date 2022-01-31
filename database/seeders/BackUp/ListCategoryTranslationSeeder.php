<?php

namespace Database\Seeders\BackUp;

use App\Models\ListCategoryTranslation;
use Illuminate\Database\Seeder;
use File;

class ListCategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/list_category_translations.json");
        $listCategories = json_decode($json);

        foreach ($listCategories as $key => $listCategory) {
            ListCategoryTranslation::create([
                "id" => $listCategory->id,
                "list_category_id" => $listCategory->list_category_id,
                "title" => $listCategory->title,
                "locale" => $listCategory->locale,
                "created_at" => $listCategory->created_at,
                "updated_at" => $listCategory->updated_at
            ]);
        }
    }
}
