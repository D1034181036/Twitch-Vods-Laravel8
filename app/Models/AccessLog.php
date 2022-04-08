<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;

    protected $table = 'access_log';

    // column的黑名單為空，等同於省略fillable
    protected $guarded = [];

    public $timestamps = false;
}
