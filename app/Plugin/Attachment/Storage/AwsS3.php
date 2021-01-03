<?php

namespace App\Plugin\Attachment\Storage;

use Illuminate\Support\Facades\Storage;

class AwsS3 extends DriverAbstract
{
    /**
     * AwsS3 constructor.
     */
    public function __construct()
    {
        $this->disk = Storage::disk('s3');
    }
}
