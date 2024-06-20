<?php

namespace App\View\Components\Conversation;

use App\Enums\ChatTypes;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $topic;
    public $content;
    public function __construct(public $chat)
    {
        list($this->topic ,$this->title, $this->content) = formatMessage($chat->content, ChatTypes::ALERT);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.conversation.alert');
    }
}
