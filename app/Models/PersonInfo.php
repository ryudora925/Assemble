<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonInfo extends Model
{
    use HasFactory;
    /**
     * 主キー
     */
    protected $prymaryKey = 'user_id';
    protected $table = "person_info";
    public $incrementing = false;
}
