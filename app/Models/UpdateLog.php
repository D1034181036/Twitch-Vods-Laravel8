<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateLog extends Model
{
    use HasFactory;

    protected $table = 'update_log';

    // column的黑名單為空，等同於省略fillable
    protected $guarded = [];

    public $timestamps = false;
}
