<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Lists;
use App\Models\ListCategory;

class TimeLine extends Component
{
    public $programs;
    public $programInfos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->programs = ListCategory::where('list_type_id', 5)
            ->where('parent_id', 5)
            ->where('status', 2)
            ->get();

        $this->programInfos = Lists::where('list_type_id', 5)
            ->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.time-line');
    }
}
