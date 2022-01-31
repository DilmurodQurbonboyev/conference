<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lists;
use App\Services\SlugService;
use Illuminate\Support\Str;


class ListsRepository extends Model
{
    public function getById($id)
    {
        return Lists::findOrFail($id);
    }

    public function saveLists($request, $list)
    {
        $slug = '';
        $slugArray = [
            $request->title_oz,
            $request->title_uz,
            $request->title_ru,
            $request->title_en,
        ];

        foreach ($slugArray as $item) {
            if (!is_null($item)) {
                $slug = $list->makeSlug($item);
                break;
            }
        }

        $lists = [
            'oz' => [
                'title' => $request->title_oz,
                'description' => $request->description_oz,
                'content' => $request->content_oz,
                'pdf_title' => $request->pdf_title_oz,
                'pdf' => $request->pdf_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
                'description' => $request->description_uz,
                'content' => $request->content_uz,
                'pdf_title' => $request->pdf_title_uz,
                'pdf' => $request->pdf_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'description' => $request->description_ru,
                'content' => $request->content_ru,
                'pdf_title' => $request->pdf_title_ru,
                'pdf' => $request->pdf_ru,
            ],
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'pdf_title' => $request->pdf_title_en,
                'pdf' => $request->pdf_en,
            ],
            'list_type_id' => $request->list_type_id,
            'lists_category_id' => $request->lists_category_id,
            'slug' => $slug,
            'image' => $request->image,
            'anons_image' => $request->anons_image,
            'body_image' => $request->body_image,
            'show_on_slider' => $request->show_on_slider,
            'pdf_type' => $request->pdf_type,
            'video_code' => $request->video_code,
            'video' => $request->video,
            'media_type' => $request->media_type,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'parent_id' => $request->parent_id,
            'right_menu' => $request->right_menu,
            'date' => $request->date,
            'order' => $request->order,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        Lists::create($lists);
    }

    public function updateLists($request, $id)
    {
        $lists = [
            'oz' => [
                'title' => $request->title_oz,
                'description' => $request->description_oz,
                'content' => $request->content_oz,
                'pdf_title' => $request->pdf_title_oz,
                'pdf' => $request->pdf_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
                'description' => $request->description_uz,
                'content' => $request->content_uz,
                'pdf_title' => $request->pdf_title_uz,
                'pdf' => $request->pdf_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'description' => $request->description_ru,
                'content' => $request->content_ru,
                'pdf_title' => $request->pdf_title_ru,
                'pdf' => $request->pdf_ru,
            ],
            'en' => [
                'title' => $request->title_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'pdf_title' => $request->pdf_title_en,
                'pdf' => $request->pdf_en,
            ],
            'list_type_id' => $request->list_type_id,
            'lists_category_id' => $request->lists_category_id,
            'image' => $request->image,
            'anons_image' => $request->anons_image,
            'body_image' => $request->body_image,
            'show_on_slider' => $request->show_on_slider,
            'pdf_type' => $request->pdf_type,
            'video_code' => $request->video_code,
            'video' => $request->video,
            'media_type' => $request->media_type,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'parent_id' => $request->parent_id,
            'right_menu' => $request->right_menu,
            'date' => $request->date,
            'order' => $request->order,
            'status' => $request->status,
            'modifier_id' => auth()->id(),
        ];
        Lists::findOrFail($id)->update($lists);
    }

    public function deleteLists($id)
    {
        return Lists::findOrFail($id)->delete();
    }
}
