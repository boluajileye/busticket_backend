<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
   

    public function definition()
    {
        return [
            'companyName',
            'licensePlate',
            'driverName',
            'busCapacity',
        ];
    }
    public function BusSchedule()    
    {  
              return $this->hasMany(BusSchedule::class);
    }
}
