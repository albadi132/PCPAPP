<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Problem;

class Contest extends Model
{
    use HasFactory;
    public $table='contests';

    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }

    
}
