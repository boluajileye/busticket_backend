<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
            'bus_id',
            'take_off_time',            
            'drop_off_time',
            'take_off',
            'destination',
            'ticket_price',
    ];
    public function Bus()    
    {        
        return $this->belongsTo(Bus::class);    
    }
    public function BusTicket()    
    {  
        return $this->hasMany(BusTicket::class);
    }
}
