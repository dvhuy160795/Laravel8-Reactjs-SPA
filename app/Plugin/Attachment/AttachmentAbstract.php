<?php

namespace App\Plugin\Attachment;

use App\Plugin\Attachment\Storage\StorageFactory;
use App\Repositories\AttachmentRepository;
use Exception;
use Illuminate\Http\UploadedFile;

abstract class AttachmentAbstract implements AttachmentInterface
{

    /**
     * Define visibility.
     *
     * @var string
     */
    protected $visibility;

    /**
     * Define storage.
     *
     * @var string
     */
    protected $storage;

    /**
     * Define repository.
     *
     * @var string
     */
    protected $repository;

    /**
     * Define storage's type
     *
     * @var string
     */
    protected $storageType;

    /**
     * AttachmentAbstract constructor.
     *
     * @param AttachmentRepository $attachmentRepository
     * @param string               $storageType
     */
    public function __construct(AttachmentRepository $attachmentRepository, string $storageType = 'local')
    {
        $storageFactory = new StorageFactory();

        $this->repository = $attachmentRepository;
        $this->storage = $storageFactory->factory($storageType);
        $this->storageType = $storageType;
    }

    /**
     * Get info attachment.
     *
     * @param  int   $id
     * @param  array $fields
     * @return object|null
     * @throws Exception
     */
    public function getInfo(int $id, array $fields = ['*'])
    {
        $attachment = $this->repository->getOne($id, $fields);
        $attachment['path'] = $this->storage->url($attachment['path']);

        return $attachment;
    }

    /**
     * Upload attachment.
     *
     * @param  UploadedFile $file
     * @param  int          $objectId
     * @param  string       $objectType
     * @param  string       $dirPath
     * @return false|string
     * @throws Exception
     */
    public function upload(
        UploadedFile $file,
        int $objectId,
        string $objectType,
        string $dirPath = 'attachments'
    ) {
        $path = $file->storeAs(
            $dirPath,
            $file->hashName(),
            [
                'disk' => $this->storageType,
                'visibility' => $this->visibility,
            ]
        );
        $attachment = $this->repository->create(
            [
                'name' => $file->getFilename(),
                'extension' => $file->getExtension(),
                'size' => $file->getSize(),
                'mine_type' => $file->getMimeType(),
                'path' => $path,
                'store_type' => $this->storageType,
                'visibility_type' => $this->visibility,
                'object_type' => $objectType,
                'object_id' => $objectId,
            ]
        );
        $attachment['path'] = $this->storage->url($path);
        return $attachment;
    }
}
