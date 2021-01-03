<?php

namespace App\Plugin\Attachment\Storage;

class StorageFactory
{

    /**
     * Define configs of storage.
     *
     * @var array
     */
    private $storages = [
        'local' => Local::class,
        's3' => AwsS3::class,
    ];

    /**
     * StorageFactory factory.
     *
     * @param  string $storage
     * @return mixed
     */
    public function factory(string $storage)
    {
        return $this->loadStorage($storage);
    }

    /**
     * Load instance.
     *
     * @param  string $storage
     * @return mixed
     */
    private function loadStorage(string $storage)
    {
        $instance = $this->storages[$storage]();
        return $instance->disk;
    }
}
