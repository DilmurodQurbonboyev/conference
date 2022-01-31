<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class MenusCategory extends Component
{
    public $searchId, $searchTitle, $searchUser, $searchStatus;
    public $perPage = 10;
    public $deleteId = '';

    use WithPagination;

    public function render()
    {
        $users = User::all();
        $query = \App\Models\MenusCategory::query();

        $query->when($this->searchId != "", function ($q) {
            return $q->where('id', $this->searchId);
        });

        $query->when($this->searchTitle != "", function ($q) {
            return $q->whereHas('menus_category_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->searchTitle . '%');
            });
        });

        $query->when($this->searchStatus != "", function ($q) {
            return $q->where('status', $this->searchStatus);
        });


        $query->when($this->searchUser != "", function ($q) {
            return $q->where('user_id', $this->searchUser);
        });

        $menusCategories = $query->paginate($this->perPage);
        return view('livewire.menus-category', compact('menusCategories', 'users'));
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        \App\Models\MenusCategory::findOrFail($this->deleteId)->delete();
    }
}
