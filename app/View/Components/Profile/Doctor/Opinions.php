<?php

namespace App\View\Components\Profile\Doctor;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Opinions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile.doctor.opinions');
    }
}
