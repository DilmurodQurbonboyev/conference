<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class MenuRepository extends Model
{
    public function getAll()
    {
        return Menu::orderBy('id', 'desc')->paginate(15);
    }

    public function getById($id)
    {
        return Menu::findOrFail($id);
    }

    public function saveMenu($request)
    {
        $menus = [
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
            'parent_id' => $request->parent_id,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'image' => $request->image,
            'menus_category_id' => $request->menus_category_id,
            'order' => $request->order,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ];
        Menu::create($menus);
    }

    public function updateMenu($request, $id)
    {
        $menus = [
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
            'parent_id' => $request->parent_id,
            'link' => $request->link,
            'link_type' => $request->link_type,
            'image' => $request->image,
            'menus_category_id' => $request->menus_category_id,
            'order' => $request->order,
            'status' => $request->status,
            'modifier_id' => auth()->id(),
        ];
        Menu::findOrFail($id)->update($menus);
    }

    public function deleteMenu($id)
    {
        return Menu::findOrFail($id)->delete();
    }
}
