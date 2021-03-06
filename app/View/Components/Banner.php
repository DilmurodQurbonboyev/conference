<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;
use App\Models\Menu;

class Banner extends Component
{
    public $top_menu;
    public $top_menu_tree;
    public $about;
    public $partners;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->top_menu = Menu::where('menus_category_id', 1)
            ->where('status', 2)
            ->orderBy('id', 'asc')
            ->orderBy('order', 'desc')
            ->get();
        $this->top_menu_tree = Menu::buildTree($this->top_menu->toArray());

        $this->about = Lists::where('list_type_id', 6)
            ->where('lists_category_id', 4)
            ->where('status', 2)
            ->first();

        $this->partners = Lists::where('list_type_id', 6)
            ->where('lists_category_id', 3)
            ->orderBy('order', 'desc')
            ->where('status', 2)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}
