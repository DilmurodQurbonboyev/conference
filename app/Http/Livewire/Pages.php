<?php

namespace App\Http\Livewire;

use App\Models\ListCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use App\Models\Lists;
use Livewire\WithPagination;


class Pages extends Component
{
    use WithPagination;

    public $deleteId = '';
    protected $paginationTheme = "bootstrap";

    public $filter_id,
        $filter_title,
        $filter_category,
        $filter_slug,
        $filter_count_view,
        $filter_status,
        $filter_description,
        $filter_user,
        $filter_link_type;

    public $perPage = 10;

    public function render()
    {
        $users = User::all();
        $pagesCategories = ListCategory::where('list_type_id', 5)->get();
        $query = Lists::query()->where('list_type_id', 5);

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_category != "", function ($q) {
            return $q->where('lists_category_id', $this->filter_category);
        });

        $query->when($this->filter_category != "", function ($q) {
            return $q->where('lists_category_id', $this->filter_category);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('lists_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $query->when($this->filter_slug != "", function ($q) {
            return $q->where('slug', 'like', '%' . $this->filter_slug . '%');
        });

        $query->when($this->filter_description != "", function ($q) {
            return $q->whereHas('lists_translation', function (Builder $query) {
                $query->where('description', 'like', '%' . $this->filter_description . '%');
            });
        });

        $query->when($this->filter_count_view != "", function ($q) {
            return $q->where('count_view', $this->filter_count_view);
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });

        $query->when($this->filter_user != "", function ($q) {
            return $q->where('user_id', $this->filter_user);
        });

        $pages = $query->paginate($this->perPage);
        return view('livewire.pages', compact('pagesCategories', 'pages', 'users'));
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        Lists::findOrFail($this->deleteId)->delete();
    }
}
