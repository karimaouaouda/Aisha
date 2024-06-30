<?php

namespace App\Filament\Shared\Pages;

use Filament\Facades\Filament;
use Filament\Pages\Page;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


class Conversation extends Page
{

    protected static ?string $navigationLabel = "Conversations";

    protected static ?string $navigationIcon = 'icon-messenger';

    protected ?string $heading = 'inbox';

    public ?\App\Models\Base\Conversation $record = null;

    public bool $hasConversations = true;

    public Collection $conversations;

    protected static string $view = 'filament.shared.pages.conversations';

    public function mount(Request $request): void
    {
        $this->conversations = Filament::auth()->user()->conversations();
        if( $this->conversations->count()  <= 0 ){
            $this->hasConversations = false;
            return;
        }

        if( $request->has('c') ){
            $this->record = \App\Models\Base\Conversation::find($request->input('c'));


            return;
        }

        $this->record = $this->conversations->shift()->first();
    }

    protected function getViewData(): array
    {
        $other = $this->record?->getOtherParticipant(Filament::auth()->user());
        return [
            'conversation' => $this->record,
            'user' => Filament::auth()->user(),
            'other' => $other,
            'conversations' => $this->conversations,
            'hasConversations' => $this->hasConversations
        ];
    }


}
