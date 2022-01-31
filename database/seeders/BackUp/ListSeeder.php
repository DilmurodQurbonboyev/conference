<?php

namespace Database\Seeders\BackUp;

use App\Models\Lists;
use Illuminate\Database\Seeder;
use File;


class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/lists.json");
        $lists = json_decode($json);

        foreach ($lists as $key => $list) {
            Lists::create([
                "id" => $list->id,
                "list_type_id" => $list->list_type_id,
                "lists_category_id" => $list->lists_category_id,
                "slug" => $list->slug,
                "image" => $list->image,
                "anons_image" => $list->anons_image,
                "body_image" => $list->body_image,
                "show_on_slider" => $list->show_on_slider,
                "pdf_type" => $list->pdf_type,
                "video_code" => $list->video_code,
                "video" => $list->video,
                "media_type" => $list->media_type,
                "link" => $list->link,
                "link_type" => $list->link_type,
                "parent_id" => $list->parent_id,
                "right_menu" => $list->right_menu,
                "date" => $list->date,
                "order" => $list->order,
                "status" => $list->status,
                "user_id" => $list->user_id,
                "modifier_id" => $list->modifier_id,
                "deleted_at" => $list->deleted_at,
                "created_at" => $list->created_at,
                "updated_at" => $list->updated_at
            ]);
        }
    }
}
