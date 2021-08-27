<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class band_edit extends Model
{
    use HasFactory;
    protected $table = 'band_info';
    protected $fillable = ['user_id', 'area', 'band_part', 'want_part', 'category', 'style', 'introduction'];
    protected $primaryKey = 'user_id';
}
