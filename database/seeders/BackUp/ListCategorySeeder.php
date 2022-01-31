<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\ListCategory;

class ListCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/list_categories.json");
        $listCategories = json_decode($json);

        foreach ($listCategories as $key => $listCategory) {
            ListCategory::create([
                "id" => $listCategory->id,
                "list_type_id" => $listCategory->list_type_id,
                "parent_id" => $listCategory->parent_id,
                "slug" => $listCategory->slug,
                "color" => $listCategory->color,
                "image" => $listCategory->image,
                "status" => $listCategory->status,
                "user_id" => $listCategory->user_id,
                "created_at" => $listCategory->created_at,
                "updated_at" => $listCategory->updated_at
            ]);
        }
    }
}
