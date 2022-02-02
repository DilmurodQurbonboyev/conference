<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\MCategory;
use Illuminate\Support\Str;


class ManagementCategoryRepository extends Model
{
    public function getById($id)
    {
        return MCategory::findOrFail($id);
    }

    public function saveMangementsCategory($request, $managementCategory)
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
                $slug = $managementCategory->makeSlug($item);
                break;
            }
        }

        $mcategories = [
            'oz' => [
                'title' => $request->title_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
            ],
            'en' => [
                'title' => $request->title_en,
            ],
            'list_type_id' => $request->list_type_id,
            'parent_id' => $request->parent_id,
            'image' => $request->image,
            'order' => $request->order,
            'slug' => $slug,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        MCategory::create($mcategories);
    }

    public function updateMangementsCategory($request, $id)
    {
        $mcategories = [
            'oz' => [
                'title' => $request->title_oz,
            ],
            'uz' => [
                'title' => $request->title_uz,
            ],
            'ru' => [
                'title' => $request->title_ru,
            ],
            'en' => [
                'title' => $request->title_en,
            ],
            'list_type_id' => $request->list_type_id,
            'parent_id' => $request->parent_id,
            'image' => $request->image,
            'order' => $request->order,
            'status' => $request->status,
            'modifier_id' => auth()->id(),
        ];
        MCategory::findOrFail($id)->update($mcategories);
    }

    public function deleteMangementsCategory($id)
    {
        MCategory::findOrFail($id)->delete();
    }
}
