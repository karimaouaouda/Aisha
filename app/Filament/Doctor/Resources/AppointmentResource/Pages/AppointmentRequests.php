<?php

namespace App\Filament\Doctor\Resources\AppointmentResource\Pages;

use App\Enums\AppointmentStatus;
use App\Enums\AuthRoles;
use App\Filament\Doctor\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Auth\Doctor;
use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;
use Filament\Support\View\Components\Modal;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AppointmentRequests extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected Doctor|Authenticatable $doctor;

    protected ?string $heading = 'Appointments Requests';

    protected ?string $subheading = 'you patients wants to meet you';

    public function mount(): void
    {
        $this->authorizeAccess();

        $this->loadDefaultActiveTab();
    }
    protected function getTableQuery(): ?Builder
    {
        $this->doctor = Filament::auth()->user();
        return $this->doctor->appointmentRequests();
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("patient.name")
                    ->label("requester")
                    ->searchable()
                    ->html()
                    ->formatStateUsing(function (Appointment $record){
                        return view('filament.parts.profile-pic', ['user' => $record->patient]);
                    }),
                TextColumn::make('created_at')
                    ->label('requested at')
                    ->color(Color::Sky)
                    ->badge(),
                TextColumn::make('reason')
                    ->wrap()
                    ->label('reason for request')
                    ->icon('heroicon-o-question-mark-circle')
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('reject')
                    ->label('reject')
                    ->color(Color::Red)
                    ->icon('heroicon-o-x-circle')
                    ->form([
                        Textarea::make('reject_reason')
                            ->label('reject reason')
                            ->helperText('tell the patient why you reject his request,
                                if the appointment reason does not need an appointment you can message him')
                            ->placeholder('i reject your appointment because ...')
                            ->required()
                    ])
                    ->action(function(array $data, Appointment $record){
                        $record->reject_reason = $data['reject_reason'];
                        $record->status = AppointmentStatus::REJECTED->value;
                        $record->save();

                        Notification::make()
                            ->title('doctor : ' . $this->doctor->name . ' reject your appointment request')
                            ->body('and tell you : ' . $data['reject_reason'])
                            ->color(Color::Red)
                            ->icon('heroicon-o-exclamation-triangle')
                            ->sendToDatabase($record->patient);
                    })
                    ->requiresConfirmation(),

                Action::make('accept')
                    ->label('accept')
                    ->icon('heroicon-o-check-circle')
                    ->color(Color::Green)
                    ->form([
                        Textarea::make('note')
                            ->label('tell him a note')
                            ->helperText('tell the patient some note like to bring analysis or some thing else (optional)')
                            ->placeholder('i accept your appointment, bring ... ')
                            ->default('none'),
                        DateTimePicker::make('time')
                            ->label('appointment date')
                            ->minDate(now()->addHours(1))
                            ->maxDate(now()->addDays(25))
                            ->required()
                    ])
                    ->action(function(array $data, Appointment $record){
                        $record->status = AppointmentStatus::ACCEPTED->value;
                        $record->time = $data['time'];
                        $record->save();

                        Notification::make()
                            ->title('doctor : ' . $this->doctor->name . ' accept your appointment request')
                            ->body('and tell you : ' . $data['note'])
                            ->color(Color::Red)
                            ->icon('heroicon-o-exclamation-triangle')
                            ->sendToDatabase($record->patient);
                    })
                    ->requiresConfirmation()
                    ->modalIcon('heroicon-o-check-circle')
                    ->modalIconColor(Color::Green)
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Action::make('reject')
                        ->label('reject selected requests')
                        ->color(Color::Red)
                        ->icon('heroicon-o-x-circle')
                        ->form([
                            Textarea::make('reject_reason')
                                ->label('reject reason')
                                ->helperText('tell the patient why you reject his request,
                                if the appointment reason does not need an appointment you can message him')
                                ->placeholder('i reject your appointment because ...')
                                ->required()
                        ])
                        ->action(function(array $data, Collection $records){
                            $records->each(function($record) use ($data){
                                $record->reject_reason = $data['reject_reason'];
                                $record->status = AppointmentStatus::REJECTED->value;
                                $record->save();

                                Notification::make()
                                    ->title('doctor : ' . $this->doctor->name . ' reject your appointment request')
                                    ->body('and tell you : ' . $data['reject_reason'])
                                    ->color(Color::Red)
                                    ->icon('heroicon-o-exclamation-triangle')
                                    ->sendToDatabase($record->patient);
                            });
                        })
                        ->requiresConfirmation(),

                    Action::make('accept')
                        ->label('accept selected requests')
                        ->icon('heroicon-o-check-circle')
                        ->color(Color::Green)
                        ->form([
                            Textarea::make('note')
                                ->label('tell them a note')
                                ->helperText('tell the patients some note like to bring analysis or some thing else (optional)')
                                ->placeholder('your welcome, please bring ...')
                                ->default('none'),
                        ])
                        ->action(function(array $data, Collection $records){
                            $records->each(function($record) use ($data){
                                $record->status = AppointmentStatus::ACCEPTED->value;
                                $record->time = $data['time'];
                                $record->save();

                                Notification::make()
                                    ->title('doctor : ' . $this->doctor->name . ' accept your appointment request')
                                    ->body('and tell you : ' . $data['note'])
                                    ->color(Color::Red)
                                    ->icon('heroicon-o-exclamation-triangle')
                                    ->sendToDatabase($record->patient);
                            });
                        })
                        ->requiresConfirmation()
                        ->modalIcon('heroicon-o-check-circle')
                        ->modalIconColor(Color::Green)
                ])
            ]);
    }
}
