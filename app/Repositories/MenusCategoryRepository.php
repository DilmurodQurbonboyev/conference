<?php

namespace App\Repositories;

use App\Models\MenusCategory;
use Illuminate\Database\Eloquent\Model;

class MenusCategoryRepository extends Model
{

    public function getAll()
    {
        return MenusCategory::orderBy('id', 'desc')->paginate(10);
    }

    public function getById($id)
    {
        return MenusCategory::findOrFail($id);
    }

    public function saveCategory($request)
    {
        $menusCategory = [
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
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        MenusCategory::create($menusCategory);
    }

    public function updateCategory($request, $id)
    {
        $menusCategory = [
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
            'status' => $request->status,
            'modifier_id' => auth()->id(),
        ];
        MenusCategory::findOrFail($id)->update($menusCategory);
    }


    public function deleteCategory($id)
    {
        return MenusCategory::findOrFail($id)->delete();
    }

}
