<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use App\Models\MenuTranslation;
use File;

class MenuTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/menu_translations.json");
        $menusTrans = json_decode($json);

        foreach ($menusTrans as $menusCategoryTrans) {
            MenuTranslation::create([
                "id" => $menusCategoryTrans->id,
                "menu_id" => $menusCategoryTrans->menu_id,
                "title" => $menusCategoryTrans->title,
                "locale" => $menusCategoryTrans->locale,
                "created_at" => $menusCategoryTrans->created_at,
                "updated_at" => $menusCategoryTrans->updated_at,
            ]);
        }
    }
}
