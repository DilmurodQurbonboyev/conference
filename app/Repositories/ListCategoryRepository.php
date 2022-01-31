<?php

namespace App\Repositories;

use App\Models\ListCategory;
use App\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ListCategoryRepository extends Model
{
    public function getById($id)
    {
        return ListCategory::findOrFail($id);
    }

    public function saveCategory($request, $listCategory)
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
                $slug = $listCategory->makeSlug($item);
                break;
            }
        }

        $listCategories = [
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
            'slug' => $slug,
            'color' => $request->color,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        ListCategory::create($listCategories);
    }

    public function updateCategory($request, $id)
    {
        $listCategories = [
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
            'color' => $request->color,
            'image' => $request->image,
            'order' => $request->order,
            'status' => $request->status,
            'modifier_id' => auth()->id(),
        ];
        ListCategory::findOrFail($id)->update($listCategories);
    }

    public function deleteCategory($id)
    {
        ListCategory::findOrFail($id)->delete();
    }
}
