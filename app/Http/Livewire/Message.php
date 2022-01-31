<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $filter_id, $filter_title;

    public $perPage = 10;

    public function render()
    {
        $query = \App\Models\Message::query();

        $query->when($this->filter_id != "", function ($q) {
            return $q->where('id', $this->filter_id);
        });

        $query->when($this->filter_title != "", function ($q) {
            return $q->whereHas('message_translation', function (Builder $query) {
                $query->where('title', 'like', '%' . $this->filter_title . '%');
            });
        });

        $messages = $query->paginate($this->perPage);

        return view('livewire.message', compact('messages'));
    }
}
