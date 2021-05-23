<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestCase;

class Problem extends Model
{
    use HasFactory;
    public $table='problems';

    public function Testcases()
    {
        return $this->belongsToMany(TestCase::class , 'problem_testcase' , 'problem_id' , 'testcase_id');
    }
}
