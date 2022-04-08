<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $table = 'videos';

    // column的黑名單為空，等同於省略fillable
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\Users');
        // return $this->belongsTo(OrderTracker::class, 'shipment_code', 'reference_bbcode');
    }
}
