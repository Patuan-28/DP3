<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelolaPenilaian extends Model
{
    use HasFactory;
    protected $table = 'kelolapenilaians';
    public $timestamps = false;
}
