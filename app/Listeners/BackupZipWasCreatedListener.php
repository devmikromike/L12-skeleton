<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Backup\Events\BackupZipWasCreated;
use ZipArchive;

class BackupZipWasCreatedListener
{ 
    public function handle(BackupZipWasCreated $event): void
    {
        $pathToZip = $event->pathToZip;
        Log::info("Backup zip valmis: {$pathToZip}");        
    }
}