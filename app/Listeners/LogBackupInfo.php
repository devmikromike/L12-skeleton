<?php

namespace App\Listeners;

 
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Backup\Events\BackupWasSuccessful;

class LogBackupInfo
{
    /**
     * Create the event listener.
     */
    public function handle(BackupWasSuccessful $event)
    {
           // Hae viimeisin backup‑tiedosto
        $backupDestination = $event->backupDestination;
        $backup = $backupDestination->newestBackup();

        if ($backup) {
            // Täydellinen polku
            $path = $backup->path();


            // Koko tavuina //  $size = $backup->size();
            $size = $backup->sizeInBytes();
            

            // Voit muuntaa koon helposti kilotavuiksi/megabiteiksi
            $sizeKb = round($size / 1024, 2);
            $sizeMb = round($size / 1024 / 1024, 2);

            Log::info("Backup valmis: {$path}, koko {$sizeKb} KB ({$sizeMb} MB)");
        }
    }

    /**
     * Handle the event.
     */
 
}
