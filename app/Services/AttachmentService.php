<?php

/**
 * Attachment's Service - Define logic of method need have.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Services;

use App\Repositories\AttachmentRepository;
use Exception;

/**
 * Class AttachmentService.
 *
 * @package App\Services
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class AttachmentService extends ServiceAbstract
{

    /**
     * Attachment's repository.
     *
     * @var AttachmentRepository
     */
    protected $repository;

    /**
     * AttachmentService constructor.
     *
     * @param AttachmentRepository $attachmentRepository : Object AttachmentRepository.
     */
    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->repository = $attachmentRepository;
    }
}
