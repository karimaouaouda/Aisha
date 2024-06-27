<?php

namespace App\View\Components\Conversation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Normal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $content, public bool $sent)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.conversation.normal');
    }
}
