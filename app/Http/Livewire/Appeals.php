<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;


class Appeals extends Component
{
    public $filter_id,
        $filter_project,
        $filter_bank_number,
        $filter_status;

    public $perPage = 10;
    protected $paginationTheme = "bootstrap";
    use WithPagination;


    public function render()
    {

        $query = Register::query();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_project != "", function ($q) {
            return $q->where('project', 'like', '%' . $this->filter_project . '%');
        });

        $query->when($this->filter_bank_number != "", function ($q) {
            return $q->where('bank_number', 'like', '%' . $this->filter_bank_number . '%');
        });

        $query->when($this->filter_status != "", function ($q) {
            return $q->where('status', $this->filter_status);
        });

        $appeals = $query->paginate($this->perPage);

        return view('livewire.appeals', compact('appeals'));
    }
}
