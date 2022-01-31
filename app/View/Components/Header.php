<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Header extends Component
{
    public $top_menu;
    public $top_menu_tree;
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
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
