<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Log extends Component
{

    use WithPagination;
    public $filter_id,
        $filter_modal,
        $filter_row,
        $filter_ip,
        $filter_action,
        $filter_created_at,
        $filter_user;

    public $perPage = 10;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $users = User::all();

        $query = DB::table('audits');

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $audits = $query->paginate($this->perPage);
        return view('livewire.log', compact('users', 'audits'));
    }
}
