<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Backup\Events\CleanupWasSuccessful;

class CleanupWasSuccessfullyListener
{  
    /**
     * Handle the event.
     */
    public function handle(CleanupWasSuccessful $event): void
    {
        $backupDestination = $event->backupDestination;
        $pathName =  $backupDestination->backupName();
        $backups = $backupDestination->backups();

        $diskName = $backupDestination->diskName();
        $options = $backupDestination->getDiskOptions();

        $access = $backupDestination->isReachable();

      //  dd($access, $diskName);
    }
}
