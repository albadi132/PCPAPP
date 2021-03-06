<?php

use App\Models\User;
use App\Models\SubmissionsLog;
use App\Models\TestCase;
use App\Models\Contest;
use App\Models\Team;






function getUsername($id)
{
  $user = User::where('id' , $id)->first();
  $username = $user->first_name . ' ' . $user->last_name;
  return $username;
}

function getMyTeamName($comid, $userid)
{
  $contest = Contest::with('teams')->where('id' ,$comid)->first();

  $usercheck = User::where('id' , $userid)->first();



  if ($contest->participation == 'team') {

    foreach ($contest->teams as $team) {
      $teamwithuser = [];
      $part = array();
      $teamwithuser[] = Team::with('users')->where('id', $team->id)->first();
      foreach ($team->users as $user) {
        array_push($part, $user->username);
      }
      if (in_array($usercheck->username, $part)) {
        return $team->name;
      }
    }
  } else {
    return 'Error';
  }
  return 'Error';
}

function NameToUrl($string)
{
  //Convert whitespaces and underscore to dash
  $string = preg_replace("/[\s_]/", "_", $string);
  return $string;
}


function UrlToName($string)
{
  //Convert whitespaces and underscore to dash
  $string = str_replace("_", " ", $string);
  return $string;
}

function teamscore($users, $score)
{
  $teamscore = 0;
  foreach ($users as $user) {
    $teamscore += $score->where("user_id", $user->user_id)->sum('points');
  }

  return  $teamscore;
}

function ExecutionsLog($id)
{
  $SubmissionsLog = SubmissionsLog::with('ExecutionsLog')->where('id' ,$id)->first();
  return $SubmissionsLog->ExecutionsLog;
}


function TestCase($id)
{
  $TestCase = TestCase::where('id' ,$id)->first();
  return $TestCase;
}

function loginfo($id)
{
  $SubmissionsLog = SubmissionsLog::with('Language', 'User', 'Problem')->find($id);

  return [
    'name' => $SubmissionsLog->User->first()->first_name . ' ' . $SubmissionsLog->User->first()->last_name,
    'Language' => $SubmissionsLog->Language->first()->name,
    'Problem' => $SubmissionsLog->Problem->first()->name,
  ];
}

function filepath($id)
{
  $SubmissionsLog = SubmissionsLog::with('Language')->where('id' ,$id)->first();

  if ($SubmissionsLog->file != "MANUAL JUDGE") {
    if ($SubmissionsLog->Language->first()->name == 'Python') {
      $link = '/' . $SubmissionsLog->Language->first()->dir . '/' . substr($SubmissionsLog->file, -13, 10) . '/' . $SubmissionsLog->file;
      return $link;
    } elseif ($SubmissionsLog->Language->first()->name == 'c++') {
      $link = '/' . $SubmissionsLog->Language->first()->dir . '/' . substr($SubmissionsLog->file, -14, 10) . '/' . $SubmissionsLog->file;
      return $link;
    }
  } else {
    return 'MANUAL JUDGE';
  }
}
