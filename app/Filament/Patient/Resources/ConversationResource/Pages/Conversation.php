<?php

namespace App\Filament\Patient\Resources\ConversationResource\Pages;

use App\Filament\Patient\Resources\AnalyseResource\Pages\View;
use App\Filament\Patient\Resources\ConversationResource;
use Filament\Resources\Pages\Page;
use Illuminate\Database\Eloquent\Model;

class Conversation extends View
{
    protected static string $resource = ConversationResource::class;

    protected ?string $heading = 'inbosx';

    protected static string $view = 'filament.patient.resources.conversation-resource.pages.conversation';

}
