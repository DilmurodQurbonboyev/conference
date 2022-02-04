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


    public function render()
    {
        $query = Register::query()->where('status', 1);

        $offlineUsers = $query->paginate($this->perPage);
        return view('livewire.offline', compact('offlineUsers'));
    }
}
