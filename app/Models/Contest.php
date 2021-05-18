<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Problem;
use App\Models\Language;
use App\Models\User;
use App\Models\Team;

class Contest extends Model
{
    use HasFactory;

    public $table='contests';

    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
    public function competitor()
    {
        return $this->belongsToMany(User::class)->wherePivot('role', 'competitor');
    }
    public function organizer()
    {
        return $this->belongsToMany(User::class)->wherePivot('role', 'organizer');
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }


    
}
