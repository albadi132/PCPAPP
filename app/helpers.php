<?php

use App\Models\User;





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




?>