<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StockMovementsRelationManager extends RelationManager
{
    protected static string $relationship = 'stockMovements';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('movement_type')
                    ->options([
                        'in' => 'Stock In (Addition)',
                        'out' => 'Stock Out (Reduction)',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->minValue(1),
                Forms\Components\DateTimePicker::make('movement_date')
                    ->required()
                    ->default(now()),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
        ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('movement_type')
                    ->colors([
                        'success' => 'in',
                        'danger' => 'out',
                    ])
                    ->formatStateUsing(fn (string $state): string => $state === 'in' ? 'Stock In' : 'Stock Out'),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric(),
                Tables\Columns\TextColumn::make('movement_date')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

        protected function beforeCreate(): void //supayah otomatis mengisi product_id
    {
        // The product_id is automatically set by the relationship
        $this->form->fill([
            'product_id' => $this->ownerRecord->id,
        ]);
    }

    protected function afterCreate(): void //
    {
        $record = $this->record;
        $product = $this->ownerRecord;
        
        if ($record->movement_type === 'in') {
            $product->increment('stock', $record->quantity);
        } else {
            $product->decrement('stock', min($record->quantity, $product->stock));
        }
    }
}
