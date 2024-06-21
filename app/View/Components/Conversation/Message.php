<?php

namespace App\View\Components\Conversation;

use App\Models\Base\Chat;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Message extends Component
{
    /**
     * Create a new component instance.
     */

    public string $type;

    public array|string $parts;

    public function __construct(public Chat $chat)
    {
        $this->type = $chat->type;
        $this->parts = formatMessage($this->chat->content, $chat->type);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.conversation.message');
    }
}
