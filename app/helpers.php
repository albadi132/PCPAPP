<?php

use App\Models\User;





function getUsername($id) {
    $user = User::find($id)->get();
    $username = $user[0]->first_name . ' ' . $user[0]->last_name;
  return $username;
   }





?>