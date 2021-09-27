<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class,"id" , "post_user_id");
    }
}
