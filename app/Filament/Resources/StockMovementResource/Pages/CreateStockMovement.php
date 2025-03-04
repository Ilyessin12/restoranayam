<?php

namespace App\Filament\Resources\StockMovementResource\Pages;

use App\Filament\Resources\StockMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStockMovement extends CreateRecord
{
    protected static string $resource = StockMovementResource::class;

    protected function afterCreate(): void
    {
        $stockMovement = $this->record;
        $product = $stockMovement->product;
        
        if ($stockMovement->movement_type === 'in') {
            $product->stock += $stockMovement->quantity;
        } else { // out
            $product->stock = max(0, $product->stock - $stockMovement->quantity);
        }
        
        $product->save();
    }
}
