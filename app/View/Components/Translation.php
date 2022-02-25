<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;

class Translation extends Component
{
    public $liveStream;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->liveStream = Lists::query()
            ->where('list_type_id', 8)
            ->where('lists_category_id', 20)
            ->where('status', 2)
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.translation');
    }
}
