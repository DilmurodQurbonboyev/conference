<?php

namespace App\Http\Livewire;

use App\Models\MenusCategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;


class Menu extends Component
{
    public $deleteId = '';

    public $filter_id,
        $filter_title,
        $filter_parent_id,
        $filter_category,
        $filter_link,
        $filter_status,
        $filter_user,
        $filter_link_type;

    public $perPage = 10;

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $users = User::all();
        $parentMenus = \App\Models\Menu::where('parent_id', '=', 0)->get();
        $menusCategories = MenusCategory::all();
        $query = \App\Models\Menu::query();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_category != "", function ($q) {
            return $q->where('menus_category_id', $this->filter_category);
        });

        $query->when($this->filter_link_type != "", function ($q) {
            return $q->where('link_type', $this->filter_link_type);
        });


        $query->when($this->filter_parent_id != "", function ($q) {
            return $q->where('parent_id', $this->filter_parent_id);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('menus_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $query->when($this->filter_link != "", function ($q) {
            return $q->where('link', 'like', '%' . $this->filter_link . '%');
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });


        $query->when($this->filter_user != "", function ($q) {
            return $q->where('user_id', $this->filter_user);
        });

        $menus = $query->paginate($this->perPage);
        return view('livewire.menu', compact('menus', 'users', 'parentMenus', 'menusCategories'));
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        \App\Models\Menu::findOrFail($this->deleteId)->delete();
    }
}
