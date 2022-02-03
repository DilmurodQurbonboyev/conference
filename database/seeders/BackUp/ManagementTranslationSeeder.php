<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use File;
use App\Models\ManagementTranslation;

class ManagementTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/management_translations.json");
        $managementTranslations = json_decode($json);

        foreach ($managementTranslations as $management) {
            ManagementTranslation::create([
                "id" => $management->id,
                "management_id" => $management->management_id,
                "title" => $management->title,
                "leader" => $management->leader,
                "reception" => $management->reception,
                "address" => $management->address,
                "biography" => $management->biography,
                "description" => $management->description,
                "content" => $management->content,
                "locale" => $management->locale,
                "created_at" => $management->created_at,
                "updated_at" => $management->updated_at
            ]);
        }
    }
}
