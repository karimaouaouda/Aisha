<?php

namespace App\Filament\Doctor\Resources;

use App\Filament\Doctor\Resources\PatientResource\Pages;
use App\Filament\Doctor\Resources\PatientResource\RelationManagers;
use App\Models\Auth\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getEloquentQuery(): Builder
    {
        return Patient::query()
                            ->join('medical_followings as mf', 'patients.id', '=', 'mf.patient_id')
                            ->where('doctor_id', '=', auth('doctor')->id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(Color::Sky)
                    ->prefix('#'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('patient name'),
                Tables\Columns\TextColumn::make('email')
                    ->label('patient email')
                    ->searchable(),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('stats')
                    ->label('stats')
                    ->icon('heroicon-o-chart-pie')
                    ->url(function(Model $record){
                        return route('filament.doctor.resources.patients.stats', ['record' => $record->id]);
                    }),
                Tables\Actions\Action::make('chatting')
                    ->label('chat')
                    ->icon('heroicon-o-chat-bubble-oval-left')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
            'stats' => Pages\PatientStates::route('{record}/stats'),
            'stats.iot' => Pages\IOTDataVisualization::route('{record}/stats/iot')
        ];
    }
}
