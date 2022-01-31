<?php

namespace App\Http\Livewire;

use App\Models\ListCategory;
use App\Models\MCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;


class Management extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 10;

    public $filter_id,
        $filter_title,
        $filter_category,
        $filter_status,
        $filter_leader,
        $filter_user;

    public function render()
    {
        $users = User::all();
        $managementCategories = MCategory::where('list_type_id', 10)
            ->where('parent_id', 0)
            ->get();

        $query = \App\Models\Management::where('list_type_id', 10);

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_category != "", function ($q) {
            return $q->where('m_category_id', $this->filter_category);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('management_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $query->when($this->filter_leader != "", function ($q) {
            return $q->whereHas('management_translation', function (Builder $query) {
                $query->where('leader', 'like', '%' . $this->filter_leader . '%');
            });
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });

        $query->when($this->filter_user != "", function ($q) {
            return $q->where('user_id', $this->filter_user);
        });

        $managements = $query->paginate($this->perPage);

        return view('livewire.management', compact('managements', 'users', 'managementCategories'));
    }
}
