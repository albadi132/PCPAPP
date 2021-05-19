<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Team extends Model
{
    use HasFactory;
    public $table='teams';

    public function users()
    {
        return $this->belongsToMany(User::class)->select(array('username', 'first_name' , 'last_name'));
    }
}
