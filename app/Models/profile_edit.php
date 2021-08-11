<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile_edit extends Model
{
    use HasFactory;
    protected $table = 'person_info';
    protected $fillable = ['user_id', 'gender', 'part', 'year', 'area', 'song', 'category'];
    protected $primaryKey = 'user_id';
}
