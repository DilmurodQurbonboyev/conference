<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;

class Offline extends Component
{

    public $perPage = 20;
    protected $paginationTheme = "bootstrap";
    use WithPagination;

    public $deleteId = '';


    public $filter_fullName,
        $filter_organization,
        $filter_position,
        $filter_email;

    public function render()
    {
        $query = Register::query()->where('status', 1);

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

        $offlineUsers = $query->paginate($this->perPage);
        return view('livewire.offline', compact('offlineUsers'));
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        Register::findOrFail($this->deleteId)->delete();
    }
}
