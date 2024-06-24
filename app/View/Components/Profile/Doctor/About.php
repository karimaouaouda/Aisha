<?php

namespace App\View\Components\Profile\Doctor;

use App\View\Components\Profile\Doctor\Trait;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    /**
     * Create a new component instance.
     */
    use Trait\Profile;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile.doctor.about');
    }
}
