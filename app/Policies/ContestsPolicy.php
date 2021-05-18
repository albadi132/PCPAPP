<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest;
use App\Models\ContestUser;

class ContestsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function creat()
    {
        
        
        return Auth::user()->role === 'admin' || Auth::user()->role === 'manger';
    }

    public function OrganizerOrAdmin( $request ,$ContestId)
    {
        
        if(!is_null(Contest::find($ContestId)))
        {
       if(Auth::user()->role === 'admin' || Auth::user()->role === 'manger')
       {
           return true;
       }
       else
       {
        if(!is_null(ContestUser::where('user_id' , Auth::user()->id )
        ->where('contest_id' , $ContestId )->where('role' , 'organizer')->first()))
        {
            return true;

        }
        else
        return FALSE;



       }}
       else
       return FALSE;
    }

    public function IAmCompetitor( $request ,$ContestId)
    {

        if(is_null(ContestUser::where('user_id' , Auth::user()->id)->where('contest_id' , $ContestId )->first()))
        return FALSE;
        else
        return TRUE;
        
    }






}
