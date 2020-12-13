<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;

    public function messages()
    {
        return $this->hasMany(MessagesChat::class, 'group_id');
    }
}
