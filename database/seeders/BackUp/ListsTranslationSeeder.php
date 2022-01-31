<?php

namespace Database\Seeders\BackUp;

use Illuminate\Database\Seeder;
use App\Models\ListsTranslation;
use File;

class ListsTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/lists_translations.json");
        $lists = json_decode($json);

        foreach ($lists as $key => $list) {
            ListsTranslation::create([
                "id" => $list->id,
                "lists_id" => $list->lists_id,
                "title" => $list->title,
                "description" => $list->description,
                "content" => $list->content,
                "pdf_title" => $list->pdf_title,
                "pdf" => $list->pdf,
                "locale" => $list->locale,
                "created_at" => $list->created_at,
                "updated_at" => $list->updated_at
            ]);
        }
    }
}
