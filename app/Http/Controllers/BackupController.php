<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function run()
    {
        Artisan::call('backup:run');
    }
}
