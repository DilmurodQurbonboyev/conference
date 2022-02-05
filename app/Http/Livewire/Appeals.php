<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;
use App\Models\SendEmail;


class Appeals extends Component
{
    public $filter_fullName,
        $filter_organization,
        $filter_position,
        $filter_email;

    public $perPage = 20;
    protected $paginationTheme = "bootstrap";
    use WithPagination;


    public function render()
    {
        $query = Register::query()->where('status', 2);

        $query->when($this->filter_fullName != "", function ($q) {
            return $q->where('fullName', 'like', '%' . $this->filter_fullName . '%');
        });

        $query->when($this->filter_organization != "", function ($q) {
            return $q->where('organization', 'like', '%' . $this->filter_organization . '%');
        });

        $query->when($this->filter_position != "", function ($q) {
            return $q->where('position', 'like', '%' . $this->filter_position . '%');
        });

        $query->when($this->filter_email != "", function ($q) {
            return $q->where('email', 'like', '%' . $this->filter_email . '%');
        });

        $appeals = $query->paginate($this->perPage);

        return view('livewire.appeals', compact('appeals'));
    }
}
