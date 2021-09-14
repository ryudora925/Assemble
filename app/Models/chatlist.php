<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class chatlist extends Model
{
    use HasFactory;
    protected $table = 'talk_list';
    protected $fillable = ['user_id', 'write_user_id', 'update_at'];
    protected $primaryKey = ['user_id', 'write_user_id'];

    public function user()
    {
        return $this->hasOne(User::class , 'id' ,'write_user_id');
    }
}
