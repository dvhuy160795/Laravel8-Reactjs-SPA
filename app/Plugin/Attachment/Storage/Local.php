<?php

namespace App\Plugin\Attachment\Storage;

use Illuminate\Support\Facades\Storage;

class Local extends DriverAbstract
{
    /**
     * Local constructor.
     */
    public function __construct()
    {
        $this->disk = Storage::disk('public');
    }
}
