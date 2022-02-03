<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\MCategory;

class McategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/m_categories.json");
        $mcategories = json_decode($json);

        foreach ($mcategories as $mcategory) {
            MCategory::create([
                "id" => $mcategory->id,
                "list_type_id" => $mcategory->list_type_id,
                "parent_id" => $mcategory->parent_id,
                "slug" => $mcategory->slug,
                "image" => $mcategory->image,
                "status" => $mcategory->status,
                "user_id" => $mcategory->user_id,
                "created_at" => $mcategory->created_at,
                "updated_at" => $mcategory->updated_at
            ]);
        }
    }
}
