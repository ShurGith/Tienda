<?php

namespace App\Filament\Tienda\Resources\OrderResource\Pages;

use App\Filament\Tienda\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
