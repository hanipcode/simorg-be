<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $current =  parent::toArray($request);
        $current['user_type'] = $this->user_type;
        $current['member'] = $this->member;
        return $current;
    }
}
