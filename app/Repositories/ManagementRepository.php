<?php

namespace App\Repositories;

use App\Models\Management;
use App\Services\SlugService;


class ManagementRepository
{

    public function getById($id)
    {
        return Management::findOrFail($id);
    }

    public function saveManagement($request)
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
                if (Management::where('slug', 'LIKE', $item)->first()) {
                    $slug = SlugService::makeSlug($item . '-' . rand(1, 100));
                } else {
                    $slug = SlugService::makeSlug($item);
                }
                break;
            }
        }
        $managements = [
            'oz' => [
                'title' => $request->title_oz,
                'leader' => $request->leader_oz,
                'title2' => $request->title2_oz,
                'reception' => $request->reception_oz,
                'address' => $request->address_oz,
                'biography' => $request->biography_oz,
                'description' => $request->description_oz,
                'content' => $request->content_oz,
                'pdf_title' => $request->pdf_title_oz,
                'pdf' => $request->pdf_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
                'leader' => $request->leader_uz,
                'title2' => $request->title2_uz,
                'reception' => $request->reception_uz,
                'address' => $request->address_uz,
                'biography' => $request->biography_uz,
                'description' => $request->description_uz,
                'content' => $request->content_uz,
                'pdf_title' => $request->pdf_title_uz,
                'pdf' => $request->pdf_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'leader' => $request->leader_ru,
                'title2' => $request->title2_ru,
                'reception' => $request->reception_ru,
                'address' => $request->address_ru,
                'biography' => $request->biography_ru,
                'description' => $request->description_ru,
                'content' => $request->content_ru,
                'pdf_title' => $request->pdf_title_ru,
                'pdf' => $request->pdf_ru,
            ],
            'en' => [
                'title' => $request->title_en,
                'leader' => $request->leader_en,
                'title2' => $request->title2_en,
                'reception' => $request->reception_en,
                'address' => $request->address_en,
                'biography' => $request->biography_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'pdf_title' => $request->pdf_title_en,
                'pdf' => $request->pdf_en,
            ],
            'list_type_id' => $request->list_type_id,
            'slug' => $slug,
            'image' => $request->image,
            'anons_image' => $request->anons_image,
            'phone' => $request->phone,
            'email' => $request->email,
            'fax' => $request->fax,
            'main' => $request->main,
            'm_category_id' => $request->m_category_id,
            'order' => $request->order,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        Management::create($managements);
    }

    public function updateManagement($request, $id)
    {
        $managements = [
            'oz' => [
                'title' => $request->title_oz,
                'leader' => $request->leader_oz,
                'title2' => $request->title2_oz,
                'reception' => $request->reception_oz,
                'address' => $request->address_oz,
                'biography' => $request->biography_oz,
                'description' => $request->description_oz,
                'content' => $request->content_oz,
                'pdf_title' => $request->pdf_title_oz,
                'pdf' => $request->pdf_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
                'leader' => $request->leader_uz,
                'title2' => $request->title2_uz,
                'reception' => $request->reception_uz,
                'address' => $request->address_uz,
                'biography' => $request->biography_uz,
                'description' => $request->description_uz,
                'content' => $request->content_uz,
                'pdf_title' => $request->pdf_title_uz,
                'pdf' => $request->pdf_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
                'leader' => $request->leader_ru,
                'title2' => $request->title2_ru,
                'reception' => $request->reception_ru,
                'address' => $request->address_ru,
                'biography' => $request->biography_ru,
                'description' => $request->description_ru,
                'content' => $request->content_ru,
                'pdf_title' => $request->pdf_title_ru,
                'pdf' => $request->pdf_ru,
            ],
            'en' => [
                'title' => $request->title_en,
                'leader' => $request->leader_en,
                'title2' => $request->title2_en,
                'reception' => $request->reception_en,
                'address' => $request->address_en,
                'biography' => $request->biography_en,
                'description' => $request->description_en,
                'content' => $request->content_en,
                'pdf_title' => $request->pdf_title_en,
                'pdf' => $request->pdf_en,
            ],
            'list_type_id' => $request->list_type_id,
            'image' => $request->image,
            'anons_image' => $request->anons_image,
            'phone' => $request->phone,
            'email' => $request->email,
            'fax' => $request->fax,
            'main' => $request->main,
            'm_category_id' => $request->m_category_id,
            'order' => $request->order,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        Management::findOrFail($id)->update($managements);
    }

    public function deleteManagement($id)
    {
        Management::findOrFail($id)->delete();
    }
}
