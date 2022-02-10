<?php

namespace Database\Seeders\BackUp;

use File;
use Illuminate\Database\Seeder;
use App\Models\MenusCategory;

class MenusCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/menus_categories.json");
        $menusCategories = json_decode($json);

        foreach ($menusCategories as $key => $menusCategory) {
            MenusCategory::create([
                "id" => $menusCategory->id,
                "status" => $menusCategory->status,
                "user_id" => $menusCategory->user_id,
                "deleted_at" => $menusCategory->deleted_at,
                "created_at" => $menusCategory->created_at,
                "updated_at" => $menusCategory->updated_at
            ]);
        }
    }
}
