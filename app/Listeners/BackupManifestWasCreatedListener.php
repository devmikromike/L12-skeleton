<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Backup\Events\BackupManifestWasCreated;

class BackupManifestWasCreatedListener
{   
    public function handle(BackupManifestWasCreated $event): void
    {
        $manifest = $event->manifest;  
        
        // dd($manifest);

        //  foreach ($manifest->files() as $filePath) {
        //      // Laske SHA256 checksum
        //      if (file_exists($filePath)) {
        //          $hash = hash_file('sha256', $filePath);

        // //         // Tee mitä haluat: loggaa, tallenna DB:hen, vertaa aiempiin
        //          Log::info("Backup file: {$filePath}, SHA256: {$hash}");
        //      }
        //  }
    }
}
