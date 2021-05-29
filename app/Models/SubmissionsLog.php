<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExecutionsLog;
use App\Models\Language;
use App\Models\User;
use App\Models\Problem;

class SubmissionsLog extends Model
{
    use HasFactory;
    public $table='submissionlogs';

    public function ExecutionsLog()
    {
        return $this->belongsToMany(ExecutionsLog::class , 'executionlog_submissionlog' , 'submissionlog_id' , 'executionlog_id');
    }

    public function Language()
    {
        return $this->belongsToMany(Language::class , 'language_submissionlog' , 'submissionlog_id','language_id');
    }

    public function User()
    {
        return $this->belongsToMany(User::class , 'submissionlog_user' , 'submissionlog_id' , 'user_id');
    }

    public function Problem()
    {
        return $this->belongsToMany(Problem::class , 'problem_submissionlog' , 'submissionlog_id' , 'problem_id');
    }

}
