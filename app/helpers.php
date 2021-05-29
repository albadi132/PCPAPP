<?php

use App\Models\User;
use App\Models\SubmissionsLog;
use App\Models\TestCase;






function getUsername($id) {
    $user = User::find($id)->get();
    $username = $user[0]->first_name . ' ' . $user[0]->last_name;
  return $username;
   }

function NameToUrl($string) {
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "_", $string);
    return $string;
}


function UrlToName($string) {
  //Convert whitespaces and underscore to dash
  $string = str_replace("_", " ", $string);
  return $string;
}

function teamscore($users , $score)
{
  $teamscore = 0 ;
 foreach( $users as $user)
 {
  $teamscore += $score->where("user_id" , $user->user_id )->sum('points');
   
 }

 return  $teamscore;
}

function ExecutionsLog($id){
  $SubmissionsLog = SubmissionsLog::with('ExecutionsLog')->find($id);
  return $SubmissionsLog->ExecutionsLog;

}


function TestCase($id){
  $TestCase = TestCase::find($id);
  return $TestCase;
}

function loginfo($id){
  $SubmissionsLog = SubmissionsLog::with('Language' ,'User' ,'Problem' )->find($id);
  
  return [
    'name' => $SubmissionsLog->User->first()->first_name . ' ' . $SubmissionsLog->User->first()->last_name ,
    'Language' => $SubmissionsLog->Language->first()->name,
    'Problem' => $SubmissionsLog->Problem->first()->name,
];
}

function filepath($id){
  $SubmissionsLog = SubmissionsLog::with('Language')->find($id);

  if($SubmissionsLog->file != "MANUAL JUDGE")
  {
  if($SubmissionsLog->Language->first()->name == 'Python')
  {
    $link = '/'.$SubmissionsLog->Language->first()->dir.'/'. substr($SubmissionsLog->file, -13, 10). '/'.$SubmissionsLog->file ;
    return $link;

  }
  elseif($SubmissionsLog->Language->first()->name == 'c++')
  {
    $link = '/'.$SubmissionsLog->Language->first()->dir.'/'. substr($SubmissionsLog->file, -14, 10). '/'.$SubmissionsLog->file ;
    return $link;
  }
  }else
  {
    return 'MANUAL JUDGE';
  }

}



?>