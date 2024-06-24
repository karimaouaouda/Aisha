<?php

namespace App\Filament\Doctor\Resources;

use App\Enums\AuthRoles;
use App\Filament\Doctor\Resources\AppointmentResource\Pages;
use App\Filament\Doctor\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where("doctor_id", "=", auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Hidden::make('doctor_id')
                    ->default(Auth::user()->id),

                Forms\Components\Hidden::make('requester')
                    ->default(AuthRoles::DOCTOR->value),

                Forms\Components\Select::make('patient_id')
                    ->relationship('patient')
                    ->getSearchResultsUsing(function (string $query) {
                        return DB::table('users')
                            ->join('patients', 'users.id', '=', 'patient.user_id')
                            ->select('users.*', 'patients.*')
                            ->where('name', 'LIKE', "%{$query}%")
                            ->pluck('name', 'user_id');
                    })
                    ->searchable()
                    ->label('with patient')
                    ->required(),

                Forms\Components\DateTimePicker::make('time')
                    ->label('appointment at')
                    ->minDate(now()->addDay())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("patient.name")
                    ->label("with patient"),
                Tables\Columns\TextColumn::make('time')
                    ->label('appointment time'),
                Tables\Columns\TextColumn::make('requester')
                    ->formatStateUsing(function (string $state) {
                        return $state == AuthRoles::DOCTOR->value ? "you" : 'patient';
                    })
                    ->label('Requested By'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('cancel'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
