<?php

/**
 * Attachment's Repository
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Repositories;

use App\Models\Attachment;

/**
 * Class AttachmentRepository.
 *
 * @package App\Repositories.
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class AttachmentRepository extends RepositoryAbstract
{

    /**
     * User's model name
     *
     * @var string
     */
    protected $model = Attachment::class;
}
