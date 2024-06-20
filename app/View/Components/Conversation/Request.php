<?php

namespace App\View\Components\Conversation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Request extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $sent, public $content, public $image)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.conversation.request');
    }
}
