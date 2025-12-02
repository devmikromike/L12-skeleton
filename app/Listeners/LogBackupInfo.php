<?php

namespace App\Listeners;
 
use ZipArchive;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\Backup\Events\BackupWasSuccessful;

class LogBackupInfo
{   
    public function handle(BackupWasSuccessful $event)
    {
           // Hae viimeisin backup‑tiedosto
        $backupDestination = $event->backupDestination;
        $backup = $backupDestination->newestBackup();

        // $backName = $backupDestination->backupName();
        // $backups = $backupDestination->getDiskOptions();    

        if ($backup) {
            $size = $backup->sizeInBytes();
            // Voit muuntaa koon helposti kilotavuiksi/megabiteiksi
            $sizeKb = round($size / 1024, 2);
            $sizeMb = round($size / 1024 / 1024, 2);

            // Täydellinen polku
            $path = $backup->path();       
            $fullpath = storage_path($path);     
             
            // Log::info("Backup valmis: {$path}, koko {$sizeKb} KB ({$sizeMb} MB), polku: {$fullpath}");

            // $zip = new ZipArchive();
            // if ($zip->open($fullpath, ZipArchive::CREATE) === TRUE){
            //     $filePath = base_path('temp.txt');
            //     $zip->addFile($filePath, "temp.txt"); 
            //     $zip->close();
            // }         
            // Koko tavuina //  $size = $backup->size();
            $size = $backup->sizeInBytes();             
            Log::info("Backup valmis: {$path}, koko {$sizeKb} KB ({$sizeMb} MB), polku: {$fullpath}");


        }
    }

/* 
 // $zip = new ZipArchive();
        // $zip->open($pathToZip, ZipArchive::CREATE | ZipArchive::OVERWRITE);        
        // $status = $zip->getStatusString();
        // $zip->close();

        // // dd($pathToZip, $status);

        // Log::info("Backup zip valmis: {$status}");    


    //     $zip = new ZipArchive();

    //     $zip->open($pathToZip, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    //    // add extra file to zip.     

    //     // $file = '.temp/temp.file';
    //     // $target = base_path("temp.file");

    //     // $zip->addFile(($target ), ($file));

    //     $zip->close();

    //     $status = $zip->getStatusString();
    //     Log::info("Backup zip valmis: {$status}");

*/    
 
}
