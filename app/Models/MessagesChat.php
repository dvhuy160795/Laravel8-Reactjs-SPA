<?php

/**
 *  Message's model.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class MessagesChat
 *
 * @package App\Models
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class MessagesChat extends Model
{
    use HasFactory;

    /**
     * Relation to GroupChat
     *
     * @return BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(GroupChat::class, 'group_id');
    }
}
