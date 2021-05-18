<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'name' => $this->first_name . " " . $this->last_name,
            'gender' => $this->gender,
            'job' => $this->job,
            'workplace' => $this->workplace,
            'profile' => $this->avatar,
            'route' =>  '/profile/'.$this->username,
            'username' => $this->username,

        ];
    }
}
