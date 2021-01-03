<?php

namespace App\Plugin\Attachment;

use App\Repositories\AttachmentRepository;

class Attachment
{

    /**
     * Configs visibility
     *
     * @var array
     */
    private $attachments = [
        'private' => PrivateAttachment::class,
        'public' => PublicAttachment::class,
    ];

    /**
     * Attachment factory.
     *
     * @param  string $storageType
     * @param  string $visibility
     * @return AttachmentInterface
     */
    public function factory(string $storageType = 'local', string $visibility = 'private')
    {
        return $this->loadAttachment($storageType, $visibility);
    }

    /**
     * Load instance from configs visibility.
     *
     * @param  string $storageType
     * @param  string $visibility
     * @return AttachmentInterface
     */
    private function loadAttachment(string $storageType, string $visibility)
    {
        $repository = new AttachmentRepository();

        $instance = new $this->attachments['private']($repository, $storageType);
        if ($this->attachments[$visibility]) {
            $instance = new $this->attachments[$visibility]($repository, $storageType);
        }

        return $instance;
    }
}
