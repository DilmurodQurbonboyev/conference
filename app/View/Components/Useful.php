<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;

class Useful extends Component
{
    public $useluls;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->useluls = Lists::where('list_type_id', 6)
            ->where('lists_category_id', 2)
            ->where('status', 2)
            ->orderBy('order', 'desc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.useful');
    }
}
