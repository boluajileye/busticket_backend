<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusTicket extends Model
{
    use HasFactory;
    protected $fillable = [
            'user_id',
            'busSchedule_id',
            'status',
            'price',
            'reference',   
    ];
    public function User()    
    {        
        return $this->belongsTo(User::class);    
    }
    public function BusSchedule()    
    {  
        return $this->belongsTo(BusSchedule::class);
    }
}
