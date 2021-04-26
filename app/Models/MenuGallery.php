<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuGallery extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'menugalleries';
    public $timestamps = false;
}
