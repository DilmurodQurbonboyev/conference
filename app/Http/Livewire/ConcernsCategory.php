<?php

namespace App\Http\Livewire;

use App\Models\ListCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ListCategoryExport;


class ConcernsCategory extends Component
{
    public $perPage = 10;
    public $filter_id,
        $filter_title,
        $filter_parent_id,
        $filter_slug,
        $filter_status,
        $filter_user;

    use WithPagination;

    public function render()
    {
        $users = User::all();

        $query = ListCategory::query()->where('list_type_id', 4);

        $concernsParent = ListCategory::where('list_type_id', 4)->where('parent_id', 0)->get();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_parent_id != "", function ($q) {
            return $q->where('parent_id', $this->filter_parent_id);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('lists_category_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });

        $query->when($this->filter_slug != "", function ($q) {
            return $q->where('slug', 'like', '%' . $this->filter_slug . '%');
        });

        $query->when($this->filter_user != "", function ($q) {
            return $q->where('user_id', $this->filter_user);
        });

        $concerns = $query->paginate($this->perPage);

        return view('livewire.concerns-category', compact('users', 'concernsParent', 'concerns'));
    }

    public function export($format)
    {
        return Excel::download(new ListCategoryExport, "concerns-category.$format");
    }

}
