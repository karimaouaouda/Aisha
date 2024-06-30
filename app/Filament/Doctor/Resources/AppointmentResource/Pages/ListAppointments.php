<?php

namespace App\Filament\Doctor\Resources\AppointmentResource\Pages;

use App\Enums\AppointmentStatus;
use App\Filament\Doctor\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\DB;

class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        $requestsCount = DB::table('appointments')
                ->where('doctor_id', Filament::auth()->id())
                ->where('status', AppointmentStatus::WAITING->value)
                ->count();
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('requests')
                ->label('appointment requests ' . ($requestsCount > 0 ? "({$requestsCount})" : null ) )
                ->color(Color::Sky)
                ->icon('heroicon-o-calendar-days')
                ->url(AppointmentRequests::getUrl())
        ];
    }
}
