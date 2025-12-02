<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    protected $fillable = [
        'name', 'filename', 'foldername',
        'status', 'filesize', 'run_at',
    ];

    protected $casts = [
        'run_at' => 'datetime',
    ];
}
