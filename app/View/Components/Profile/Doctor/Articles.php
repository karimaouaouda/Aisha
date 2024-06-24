<?php

namespace App\View\Components\Profile\Doctor;

use App\View\Components\Profile\Doctor\Trait\Profile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Articles extends Component
{
    /**
     * Create a new component instance.
     */
    use Profile;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile.doctor.articles');
    }
}
