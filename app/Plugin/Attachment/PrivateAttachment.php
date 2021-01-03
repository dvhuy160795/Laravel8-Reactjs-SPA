<?php

namespace App\Plugin\Attachment;

use App\Repositories\AttachmentRepository;
use App\Repositories\RepositoryAbstract;
use Exception;
use Illuminate\Http\UploadedFile;

class PrivateAttachment extends AttachmentAbstract
{

    /**
     * Define visibility.
     *
     * @var string
     */
    protected $visibility = 'private';
}
