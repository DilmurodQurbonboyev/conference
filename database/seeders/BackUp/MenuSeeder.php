<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use File;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/menus.json");
        $menusCategoriesTrans = json_decode($json);

        foreach ($menusCategoriesTrans as $menusCategoryTrans) {
            Menu::create([
                "id" => $menusCategoryTrans->id,
                "link" => $menusCategoryTrans->link,
                "link_type" => $menusCategoryTrans->link_type,
                "image" => $menusCategoryTrans->image,
                "parent_id" => $menusCategoryTrans->parent_id,
                "menus_category_id" => $menusCategoryTrans->menus_category_id,
                "status" => $menusCategoryTrans->status,
                "order" => $menusCategoryTrans->order,
                "user_id" => $menusCategoryTrans->user_id,
                "modifier_id" => $menusCategoryTrans->modifier_id,
                "deleted_at" => $menusCategoryTrans->deleted_at,
                "created_at" => $menusCategoryTrans->created_at,
                "updated_at" => $menusCategoryTrans->updated_at,
            ]);
        }
    }
}
