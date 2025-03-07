<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Product;

class LaporanStokBarang extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static string $view = 'filament.pages.laporan-stok-barang';
    protected static ?string $navigationLabel = 'Laporan Stok Barang';
    protected static ?string $title = 'Laporan Stok Barang';

    public $products;

    public function mount()
    {
        $this->products = Product::orderBy('updated_at', 'desc')->get();
    }
}
