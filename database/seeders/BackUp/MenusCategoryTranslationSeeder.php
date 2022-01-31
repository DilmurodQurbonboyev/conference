<?php

namespace Database\Seeders\BackUp;

use App\Models\MenusCategoryTranslation;
use Illuminate\Database\Seeder;
use File;

class MenusCategoryTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/menus_category_translations.json");
        $menusCategoriesTrans = json_decode($json);

        foreach ($menusCategoriesTrans as $menusCategoryTrans) {
            MenusCategoryTranslation::create([
                "id" => $menusCategoryTrans->id,
                "menus_category_id" => $menusCategoryTrans->menus_category_id,
                "title" => $menusCategoryTrans->title,
                "locale" => $menusCategoryTrans->locale,
                "created_at" => $menusCategoryTrans->created_at,
                "updated_at" => $menusCategoryTrans->updated_at
            ]);
        }
    }
}
