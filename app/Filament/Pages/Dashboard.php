<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Order;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    public $orders; // Declare orders variable

    public function mount()
    {
        $this->orders = Order::with('user')->latest()->take(5)->get();
    }

    protected function getViewData(): array
    {
        return [
            'orders' => $this->orders,
        ];
    }
	
	protected function header(): ?string
    {
        return null; // Ensure no header is rendered
    }
}
