<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'extension',
        'size',
        'mine_type',
        'path',
        'store_type',
        'visibility_type',
        'object_type',
        'object_id',
    ];
}
