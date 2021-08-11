<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandInfo extends Model
{
    use HasFactory;
    /**
     * 主キー
     */
    protected $primaryKey = 'user_id';
    protected $table = "band_info";
    public $incrementing = false;
}
