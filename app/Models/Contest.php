<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Problem;
use App\Models\Language;
use App\Models\User;
use App\Models\Team;
use App\Models\SubmissionsLog;


class Contest extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
   

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

    public function teamwithuser()
    {
        return $this->hasManyDeep(User::class, ['contest_team', Team::class, 'team_user']);
    }
    public function submissionlog()
    {
        return $this->belongsToMany(SubmissionsLog::class , 'contest_submissionlog' , 'contest_id' ,'submissionlog_id');
    }


    


    
}
