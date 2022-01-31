<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Map extends Component
{
    public $searchId, $searchTitle, $searchUser, $searchStatus;
    public $perPage = 10;
    use WithPagination;

    public function render()
    {
        $users = User::all();
        $query = \App\Models\Map::query();

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

        $maps = $query->paginate($this->perPage);
        return view('livewire.map', compact('maps', 'users'));
    }
}
