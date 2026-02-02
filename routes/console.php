<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

use App\Services\Product\ProductCleanupServiceInterface;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    Log::info('Scheduler Laravel 12 jalan tiap menit');
})->everyMinute();

Schedule::call(function (ProductCleanupServiceInterface $service) {
    $deletedId = $service->deleteOldestProduct();

    if ($deletedId) {
        Log::info("Scheduler: Product ID {$deletedId} dihapus");
    } else {
        Log::info("Scheduler: Tidak ada product untuk dihapus");
    }
})->daily();