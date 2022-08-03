<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    /**
     *
     * @var array
     */
    protected $fillable = [ 
        'title', 
        'content',
        'image',
    ];

    
}
