<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = [];
    protected $table = 'menus';
    protected $fillable = ['title','slug','time','desc'];

    public function sluggable():array
    {
    	return [
    		'slug'=>[
    			'source'=>'title'
    		]
    	];	
    }
}
