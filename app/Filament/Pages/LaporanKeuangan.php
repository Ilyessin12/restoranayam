<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Order;

class LaporanKeuangan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static string $view = 'filament.pages.laporan-keuangan';
    protected static ?string $navigationLabel = 'Laporan Keuangan';
    protected static ?string $title = 'Laporan Keuangan';
	
	public $orders;

    public function mount()
    {
        // Fetch latest orders
        $this->orders = Order::with(['user', 'orderDetails.product'])->latest()->get();
    }
}