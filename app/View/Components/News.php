<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;

class News extends Component
{
    public $news;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->news = Lists::where('list_type_id', 1)
            ->where('status', 2)
            ->where('lists_category_id', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.news');
    }
}
