<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    /**
     *
     * @var array
     */
    protected $fillable = [ 
        'status', 
    ];

    public function user()
    {
       
       return $this->hasMany(User::class,'reservation_id');
    }
  
}
