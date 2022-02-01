<?php

namespace App\View\Components;

use App\Models\Lists;
use Illuminate\View\Component;

class RegisterInfo extends Component
{
    public $registerInfo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->registerInfo = Lists::where('list_type_id', 6)
            ->where('lists_category_id', 6)
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
        return view('components.register-info');
    }
}
