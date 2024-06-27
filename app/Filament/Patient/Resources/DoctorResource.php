<?php

namespace App\Filament\Patient\Resources;

use App\Filament\Patient\Resources\DoctorResource\Pages;
use App\Models\Auth\Doctor;
use App\Models\Auth\Patient;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return Doctor::query()
                    ->join(
                        'medical_followings as mf',
                        'doctors.id',
                        '=',
                        'mf.doctor_id'
                    )->where('mf.patient_id', Filament::auth()->id());
    }


    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->html()
                    ->formatStateUsing(function (Doctor $record){
                        return view('filament.parts.profile-pic', ['user' => $record]);
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->badge()
                    ->color(Color::Blue)
                    ->label('followed since'),

                Tables\Columns\TextColumn::make('speciality')
                    ->badge()
                    ->searchable()
                    ->color(Color::Green)

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('speciality'),
            ])
            ->actions([
                Tables\Actions\Action::make('chat')
                    ->label('chat')
                    ->icon('heroicon-o-chat-bubble-oval-left')
                    ->color(Color::Green),

                Tables\Actions\Action::make('notes')
                    ->label('notes')
                    ->icon('heroicon-o-sparkles')
                    ->color(Color::Sky)
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}
