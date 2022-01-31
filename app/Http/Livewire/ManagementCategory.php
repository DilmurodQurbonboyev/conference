<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use App\Models\MCategory;

class ManagementCategory extends Component
{
    public $perPage = 10;
    public $filter_id,
        $filter_title,
        $filter_parent_id,
        $filter_slug,
        $filter_status,
        $filter_user;

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        $users = User::all();
        $query = MCategory::query()
            ->where('list_type_id', 10);
        $managementParent = MCategory::where('list_type_id', 10)
            ->where('parent_id', 0)
            ->get();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_parent_id != "", function ($q) {
            return $q->where('parent_id', $this->filter_parent_id);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('m_category_translation', function (Builder $query) {
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

        $managements = $query->paginate($this->perPage);

        return view('livewire.management-category', compact('managements', 'users', 'managementParent'));
    }
}
