<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\Management;

class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/management.json");
        $mcategories = json_decode($json);

        foreach ($mcategories as $mcategory) {
            Management::create([
                "id" => $mcategory->id,
                "list_type_id" => $mcategory->list_type_id,
                "m_category_id" => $mcategory->m_category_id,
                "slug" => $mcategory->slug,
                "image" => $mcategory->image,
                "region_id" => $mcategory->region_id,
                "anons_image" => $mcategory->anons_image,
                "phone" => $mcategory->phone,
                "email" => $mcategory->email,
                "main" => $mcategory->main,
                "fax" => $mcategory->fax,
                "order" => $mcategory->order,
                "status" => $mcategory->status,
                "user_id" => $mcategory->user_id,
                "created_at" => $mcategory->created_at,
                "updated_at" => $mcategory->updated_at
            ]);
        }
    }
}
