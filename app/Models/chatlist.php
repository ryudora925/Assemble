<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;

class chatlist extends Model
{
    use HasFactory;
    protected $table = 'talk_list';
    protected $fillable = ['user_id', 'write_user_id'];
    // protected $primaryKey = ['user_id', 'write_user_id'];

}
